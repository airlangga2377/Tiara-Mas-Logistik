<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cargo\CargoPengirimanDetail;
use App\Models\Cargo\MessageTracking;
use App\Models\Cargo\TruckTracking;
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
        $kodeKota = $request->user->kodeKota();
        $wilayah = $request->user->Wilayah(); 

        $cargoArray = $request->user->truckManifests($kodeKota->kota);
        $wilayahArray = $request->user->busManifests($wilayah->wilayah);
        
        $data = array(
            'name' => $request->user->name, 

            'kodeKota' => $kodeKota,
            'wilayah' => $wilayah,

            'allCargo' => $cargoArray,
            'allWilayah' => $wilayahArray,
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
        $kodeKota = $request->user->kodeKota(); 
        $data = array(
            'name' => $request->user->name,  

            'isUserSuperadmin' => $request->user->is_user_superadmin,

            'kodeKota' => $kodeKota,
        );
        return view(CargoManifestController::$path . 'CargoPengirimanTrukManifestInput', [], $data);
    }

    /**
     * Generate a manfiest.
     *
     * @return \Barryvdh\DomPDF\Facade\Pdf
     */
    public function storeTrukManifestNote(Request $request){     
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
                jenis_barang_detail, 
                status_pembayarans.pesan, 
                DATE(cargo_pengiriman_details.created_at) as created',
            )
            ->leftJoin("status_pembayarans", "status_pembayarans.id_status_pembayaran", "cargo_pengiriman_details.id_status_pembayaran")
            ->leftJoin("cargo_pengiriman_barangs", "cargo_pengiriman_barangs.no_lmt", "cargo_pengiriman_details.no_lmt")
            ->groupBy("cargo_pengiriman_details.no_lmt")
            ->where('no_manifest', $no_manifest)
            ->get(); 

            $resume = CargoPengirimanDetail::
            selectRaw(
                '
                SUM(cargo_pengiriman_barangs.jumlah_barang) as jumlah_barang,
                SUM(cargo_pengiriman_barangs.biaya) as totalBiaya
                ',
            )
            ->leftJoin("cargo_pengiriman_barangs", "cargo_pengiriman_barangs.no_lmt", "cargo_pengiriman_details.no_lmt")
            ->groupBy("cargo_pengiriman_details.no_manifest")
            ->where('no_manifest', $no_manifest)
            ->first(); 

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
            "resume" => $resume, 
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
     * @param  \Illuminate\Http\Request  $request 
     */
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
        $no_pol = Truck::findNoPol($request->no_pol)->no_pol; 
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
     * Get manifest for api
     *
     * @param  \Illuminate\Http\Request  $request 
     */
    public function getManifest(Request $request)
    {    
        if($request->user->is_user_superadmin){
            // Untuk membuat manifest
            $data = CargoPengirimanDetail::
            selectRaw(
                'id_cargo_pengiriman_detail,
                cargo_pengiriman_details.no_lmt,
                nama_pengirim, 
                status_pembayarans.pesan, 
                DATE(cargo_pengiriman_barangs.created_at) as created',
            ) 
            ->leftJoin("status_pembayarans", "status_pembayarans.id_status_pembayaran", "cargo_pengiriman_details.id_status_pembayaran")
            ->leftJoin('cargo_pengiriman_barangs', 'cargo_pengiriman_barangs.no_lmt', 'cargo_pengiriman_details.no_lmt')
            ->where('no_manifest', null)
            ->where('tujuan', $request->tujuan) 
            
            ->orderBy('status_pembayarans.id_status_pembayaran', 'ASC') 
            ->groupBy("cargo_pengiriman_details.no_lmt") 
            ->get();

            return response()->json(["data" => $data]);
        }else{
            // Untuk membuat manifest
            $data = CargoPengirimanDetail::
            selectRaw(
                'id_cargo_pengiriman_detail,
                cargo_pengiriman_details.no_lmt,
                nama_pengirim, 
                status_pembayarans.pesan, 
                DATE(cargo_pengiriman_barangs.created_at) as created',
            ) 
            ->leftJoin("status_pembayarans", "status_pembayarans.id_status_pembayaran", "cargo_pengiriman_details.id_status_pembayaran")
            ->leftJoin('cargo_pengiriman_barangs', 'cargo_pengiriman_barangs.no_lmt', 'cargo_pengiriman_details.no_lmt')
            ->where('no_manifest', null)
            ->where('id_user', $request->user->id)
            ->where('tujuan', $request->tujuan) 
            
            ->orderBy('status_pembayarans.id_status_pembayaran', 'ASC') 
            ->groupBy("cargo_pengiriman_details.no_lmt") 
            ->get();

            return response()->json(["data" => $data]);
        }
    }
    
    /**
     * get manifest for tracking
     *
     * @param  \Illuminate\Http\Request  $request 
     */
    public function getManifestTracking(Request $request)
    {    
        try {
            $no_manifest = decrypt($request->no_manifest); 
    
            // Untuk membuat manifest
            $data = CargoPengirimanDetail::
            selectRaw(
                '
                message_trackings.pesan,  
                DATE(truck_trackings.created_at) as created',
            ) 
            ->leftJoin("truck_trackings", "truck_trackings.no_lmt", "cargo_pengiriman_details.no_lmt") 
            ->leftJoin("message_trackings", "message_trackings.id_message_tracking", "truck_trackings.id_message_tracking") 
            ->leftJoin("trucks", "trucks.no_pol", "cargo_pengiriman_details.no_pol") 
            ->where('no_manifest', $no_manifest)
            ->groupBy("message_trackings.id_message_tracking") 
            ->skip(0)->take(3)
            ->get();
        } catch (\Throwable $th) {
            return abort(404);  
        }

        return response()->json(["data" => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request 
     */
    public function updateBerangkat(Request $request)
    {
        // by no manifest
        if($request->no_manifest){
            try { 
                $no_manifest = decrypt($request->no_manifest); 
    
                $idMessageTrackingLast = CargoPengirimanDetail::
                selectRaw(
                    "MAX(message_trackings.id_message_tracking) as id_message_tracking_last",
                    )
                ->leftJoin("truck_trackings", "truck_trackings.no_lmt", "cargo_pengiriman_details.no_lmt") 
                ->leftJoin("message_trackings", "message_trackings.id_message_tracking", "truck_trackings.id_message_tracking") 
                ->groupBy("message_trackings.id_message_tracking") 
                ->where('no_manifest', $no_manifest)
                ->first()->id_message_tracking_last;

                if($idMessageTrackingLast == 1){
                    $cargoDetailArr = CargoPengirimanDetail::
                    select(
                        "cargo_pengiriman_details.no_lmt",
                    )
                    ->where('no_manifest', $no_manifest)
                    ->get();
                    foreach ($cargoDetailArr as $key => $cargoDetail) {  
                        $tracking = new TruckTracking();
                        $tracking->no_lmt = $cargoDetail->no_lmt;
                        $tracking->id_message_tracking = 2;
                        $tracking->id_status_pembayaran = null;
                        $tracking->id_user = $request->user->id;
                        $tracking->save();
                    }
                    return redirect('barang/manifest');
                }
                $data = array();
                $data['message'] = 'Kesalahan manifest';
                return redirect('barang/manifest');
            } catch (\Throwable $th) { 
                return abort(404);  
            }
        }
        $data = array();
        $data['message'] = 'Manifest tidak ditemukan';
        
        return redirect()->back()->withErrors($data);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request 
     */
    public function updateSampai(Request $request)
    {
        // by no manifest
        if($request->no_manifest){
            try { 
                $no_manifest = decrypt($request->no_manifest); 
    
                $cargoDetailArr = CargoPengirimanDetail::
                selectRaw(
                    "message_trackings.id_message_tracking",
                    )
                ->leftJoin("truck_trackings", "truck_trackings.no_lmt", "cargo_pengiriman_details.no_lmt") 
                ->leftJoin("message_trackings", "message_trackings.id_message_tracking", "truck_trackings.id_message_tracking") 
                ->groupBy("message_trackings.id_message_tracking") 
                ->where('no_manifest', $no_manifest)
                ->get()
                ->toArray();  
    
                if(end($cargoDetailArr)["id_message_tracking"] == 2){
                    $cargoDetailArr = CargoPengirimanDetail::
                    select(
                        "cargo_pengiriman_details.no_lmt",
                    )
                    ->where('no_manifest', $no_manifest)
                    ->get();
                    foreach ($cargoDetailArr as $key => $cargoDetail) {  
                        $tracking = new TruckTracking();
                        $tracking->no_lmt = $cargoDetail->no_lmt;
                        $tracking->id_message_tracking = 3;
                        $tracking->id_status_pembayaran = null;
                        $tracking->id_user = $request->user->id;
                        $tracking->save();
                    }
                    return redirect('barang/manifest');
                }
            } catch (\Throwable $th) { 
                return abort(404);  
            }
        }
        $data = array();
        $data['message'] = 'Manifest tidak ditemukan';
        
        return redirect()->back()->withErrors($data);
    }
}