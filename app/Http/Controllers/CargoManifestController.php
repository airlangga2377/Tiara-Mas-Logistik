<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cargo\CargoPengirimanDetail;
use App\Models\Cargo\Truck;
use Barryvdh\DomPDF\Facade\Pdf;

class CargoManifestController extends Controller
{
    public static $path = "page.admin.manifest.";
    /**
     * Display a page truck manfest list
     *
     * @return \Illuminate\Http\Response
     */
    protected function page(Request $request)
    {
        $cargoArray = $request->user->truckManifests();
        
        $data = array(
            'name' => $request->user->name,

            'allCargo' => $cargoArray
        );  
        return view(CargoManifestController::$path . 'CargoPengirimanTrukManifest', [], $data);
    }

    /**
     * Display a page truck non manfest list
     *
     * @param  \Illuminate\Http\Request  $request 
     */
    public function pageCreateManifest(Request $request)
    {          
        $data = array(
            'name' => $request->user->name, 

            'api_token' => $request->user->api_token, 
        );   
        return view(CargoManifestController::$path . 'CargoPengirimanTrukManifestInput', [], $data);
    }

    /**
     * Generate a manfiest.
     *
     * @return \Barryvdh\DomPDF\Facade\Pdf
     */
    public function storeTrukManifestNote(Request $request){   
        $data = array();
     
        try {  
            $no_manifest = decrypt($request->no_manifest);  
            $detail = CargoPengirimanDetail::
            selectRaw(
                'cargo_pengiriman_details.nama_pengirim,
                cargo_pengiriman_details.nama_penerima,
                cargo_pengiriman_details.no_lmt,
                SUM(cargo_pengiriman_barangs.biaya) as biaya,
                SUM(cargo_pengiriman_barangs.jumlah_barang) as jumlah_barang,
                keterangan, 
                DATE(cargo_pengiriman_details.created_at) as created',
            )
            ->leftJoin("cargo_pengiriman_barangs", "cargo_pengiriman_barangs.no_lmt", "cargo_pengiriman_details.no_lmt")
            ->groupBy("cargo_pengiriman_details.no_lmt")
            ->where('no_manifest', $no_manifest)
            ->get();

            $truck = Truck::
            selectRaw(
                'trucks.no_pol,
                trucks.sopir_utama as sopir_utama,
                cargo_pengiriman_details.sopir,
                cargo_pengiriman_details.no_manifest',
            )
            ->leftJoin("cargo_pengiriman_details", "cargo_pengiriman_details.no_pol", "trucks.no_pol")
            ->where("cargo_pengiriman_details.no_manifest", $no_manifest)
            ->groupBy("cargo_pengiriman_details.no_manifest")
            ->first()
            ;  
        } catch (\Throwable $th) {
            return abort(404);  
        }

        $pdf = PDF::loadView(CargoManifestController::$path . 'CargoPengirimanTrukManifestNote',
        [
            "detail" => $detail, 
            "truck" => $truck, 
        ]
        )
        ->SetPaper('a4') // a4 | portrait {widht: 708.66, height: 500.31500}

        ->setOption([
            'dpi' => 150, 
            'defaultFont' => 'sans-serif', 
            'isRemoteEnabled' => true, 
            'chroot' => "logo.png",
        ]);
        
        return $pdf->stream();
        // return $pdf->download("tes.pdf");
    } 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request 
     */
    public function updateManifest(Request $request)
    { 
        $no_manifest = CargoPengirimanDetail::select('no_manifest')->max('no_manifest') ? CargoPengirimanDetail::select('no_manifest')->max('no_manifest') + 1 : 1;
        
        if(
            !$request->no_pol
            || !$request->no_lmt
        ){
            $data = array();
            $data['message'] = 'Error pada input';
            return redirect()->back()->withErrors($data)->withInput();
        }
        
        if(
            count($request->no_lmt) <= 0
            || count($request->no_lmt) > 27
        ){
            $data = array();
            $data['message'] = 'Jumlah resi salah pada input';
            return redirect()->back()->withErrors($data)->withInput();
        }
        $no_pol = Truck::findNoPol($request->no_pol)->no_pol; 
        for ($i=0; $i < count($request->no_lmt); $i++) {    
            $detail = CargoPengirimanDetail::where('no_lmt', $request->no_lmt[$i]);
            $detail->update(array("no_manifest" => $no_manifest, "no_pol" => $no_pol, "sopir" => $request->sopir));
        }  
        $no_manifest = encrypt($no_manifest);  
        $sopir = encrypt($request->sopir);  
        
        return redirect()->back()->with(["message" => "Berhasil memasukkan data", "no_manifest" => $no_manifest, "sopir" => $sopir]); 
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request 
     */
    public function apiUpdateManifest(Request $request)
    {   
        // Untuk membuat manifest
        $data = CargoPengirimanDetail::
        selectRaw(
            'id_cargo_pengiriman_details,
            cargo_pengiriman_details.no_lmt,
            nama_pengirim, 
            DATE(cargo_pengiriman_barangs.created_at) as created',
        ) 
        ->where('no_manifest', null)
        // ->where('id_user', $request->user->id)
        ->where('tujuan', $request->tujuan)
        ->leftJoin('cargo_pengiriman_barangs', 'cargo_pengiriman_barangs.no_lmt', 'cargo_pengiriman_details.no_lmt')
        ->orderByDesc('cargo_pengiriman_barangs.created_at') 
        ->groupBy("cargo_pengiriman_details.no_lmt") 
        ->get();

        return response()->json(["data" => $data]);
    }
}
