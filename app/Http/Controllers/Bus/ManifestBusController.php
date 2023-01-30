<?php

namespace App\Http\Controllers\Bus;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Cargo\Bus\Bus;
use App\Models\Cargo\TruckTracking;
use App\Http\Controllers\Controller;
use App\Models\Cargo\CargoPengirimanDetail;
use App\Http\Controllers\CargoManifestController;
use App\Http\Controllers\Bus\ManifestBusController;
use App\Models\Cargo\MessageTracking;
use App\Models\Cargo\Truck;

class ManifestBusController extends Controller
{
    public static $path = "page.admin.bus.manifest.";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function pageCreateManifest(Request $request)
    {   
        $allWilayah = $request->user->allWilayah();      
        $wilayah = $request->user->wilayah();
        $cargoArray = $request->user->busManifests($wilayah->wilayah);
        $bus = $request->user->allBus();
        $data = array(
            'name' => $request->user->name,  
            'isUserSuperadmin' => $request->user->is_user_superadmin,
            'allWilayah' => $allWilayah,
            'allCargo' => $cargoArray,
            'allBus' => $bus,
            'wilayah' => $wilayah,
        );
        return view(ManifestBusController::$path . 'CreateManifestBus', [], $data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getManifest(Request $request)
    {    
        if($request->user->is_user_superadmin){
            // Untuk membuat manifest
            $data = CargoPengirimanDetail::
            selectRaw(
                'id_cargo_pengiriman_detail,
                cargo_pengiriman_details.no_resi,
                nama_pengirim, 
                status_pembayarans.pesan, 
                DATE(cargo_pengiriman_barangs.created_at) as created',
            ) 
            ->leftJoin("status_pembayarans", "status_pembayarans.id_status_pembayaran", "cargo_pengiriman_details.id_status_pembayaran")
            ->leftJoin('cargo_pengiriman_barangs', 'cargo_pengiriman_barangs.no_resi', 'cargo_pengiriman_details.no_resi')
            ->where('no_manifest', null)
            ->where('tujuan', $request->tujuan) 
            
            ->orderBy('status_pembayarans.id_status_pembayaran', 'ASC') 
            ->groupBy("cargo_pengiriman_details.no_resi") 
            ->get();

            return response()->json(["data" => $data]);
        }else{
            // Untuk membuat manifest
            $data = CargoPengirimanDetail::
            selectRaw(
                'id_cargo_pengiriman_detail,
                cargo_pengiriman_details.no_resi,
                nama_pengirim, 
                status_pembayarans.pesan, 
                DATE(cargo_pengiriman_barangs.created_at) as created',
            ) 
            ->leftJoin("status_pembayarans", "status_pembayarans.id_status_pembayaran", "cargo_pengiriman_details.id_status_pembayaran")
            ->leftJoin('cargo_pengiriman_barangs', 'cargo_pengiriman_barangs.no_resi', 'cargo_pengiriman_details.no_resi')
            ->where('no_manifest', null)
            ->where('id_user', $request->user->id)
            ->where('tujuan', $request->tujuan) 
            
            ->orderBy('status_pembayarans.id_status_pembayaran', 'ASC')
            ->get();

            return response()->json(["data" => $data]);
        }
    }
    public function createManifest(Request $request)
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
        $no_pol = Bus::cariNoPol($request->no_pol)->no_pol; 
        for ($i=0; $i < count($request->no_lmt); $i++) {    
            $detail = CargoPengirimanDetail::where('no_lmt', $request->no_lmt[$i])->first();
            $detail->update(array("no_manifest" => $no_manifest, "no_pol" => $no_pol, "sopir" => $request->sopir));

            $tracking = new TruckTracking();
            $tracking->no_lmt = $request->no_lmt[$i];
            $tracking->id_message_tracking = 1;
            $tracking->id_status_pembayaran = $detail->id_status_pembayaran;
            $tracking->id_user = $request->user->id;
            $tracking->save();
        }  

        $no_manifest = encrypt($no_manifest);  
        $sopir = encrypt($request->sopir);  
        
        return redirect()->back()->with(["message" => "Berhasil memasukkan data", "no_manifest" => $no_manifest, "sopir" => $sopir]); 
    }


    /**
     * Generate a manfiest.
     *
     * @return \Barryvdh\DomPDF\Facade\Pdf
     */
    public function storeCetakManifestBus(Request $request){     
        try {  
            $no_manifest = decrypt($request->no_manifest);  
            $detail = CargoPengirimanDetail::
            selectRaw(
                'cargo_pengiriman_details.nama_pengirim,
                cargo_pengiriman_details.nama_penerima,
                cargo_pengiriman_details.no_resi,
                SUM(cargo_pengiriman_barangs.biaya) as biaya,
                SUM(cargo_pengiriman_barangs.jumlah_barang) as jumlah_barang,
                keterangan, 
                jenis_paket,
                status_pembayarans.pesan, 
                DATE(cargo_pengiriman_details.created_at) as created',
            )
            ->leftJoin("status_pembayarans", "status_pembayarans.id_status_pembayaran", "cargo_pengiriman_details.id_status_pembayaran")
            ->leftJoin("cargo_pengiriman_barangs", "cargo_pengiriman_barangs.no_resi", "cargo_pengiriman_details.no_resi")
            ->groupBy("cargo_pengiriman_details.no_resi")
            ->where('no_manifest', $no_manifest)
            ->get(); 

            $resume = CargoPengirimanDetail::
            selectRaw(
                '
                SUM(cargo_pengiriman_barangs.jumlah_barang) as jumlah_barang,
                SUM(cargo_pengiriman_barangs.biaya) as totalBiaya
                ',
            )
            ->leftJoin("cargo_pengiriman_barangs", "cargo_pengiriman_barangs.no_resi", "cargo_pengiriman_details.no_resi")
            ->groupBy("cargo_pengiriman_details.no_manifest")
            ->where('no_manifest', $no_manifest)
            ->first(); 

            $bus = Bus::
            selectRaw(
                'bus.no_pol,
                bus.sopir_utama as sopir_utama,
                cargo_pengiriman_details.sopir,
                cargo_pengiriman_details.no_manifest',
            )
            ->leftJoin("cargo_pengiriman_details", "cargo_pengiriman_details.no_pol", "bus.no_pol")
            ->where("cargo_pengiriman_details.no_manifest", $no_manifest)
            ->groupBy("cargo_pengiriman_details.no_manifest")
            ->first()
            ;  
        } catch (\Throwable $th) {
            return abort(404);  
        }

        $pdf = PDF::loadView(ManifestBusController::$path . 'CetakManifestBus',
        [
            "detail" => $detail, 
            "bus" => $bus, 
            "resume" => $resume,
            "user" => $request->user->kodewilayah(),
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
    } 

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
