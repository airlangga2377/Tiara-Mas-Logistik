<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cargo\Bus\Bus;
use Illuminate\Http\Request;
use App\Models\Cargo\CargoPengirimanDetail;
use App\Models\Cargo\Tracking;
use App\Models\Cargo\Truk\Truck;
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

        $cargoArray = $request->user->manifests($request->user->id_kode_kota);
        
        $data = array(
            'name' => $request->user->name, 

            'jenisUser' => $request->user->jenis_user,

            'kodeKota' => $kodeKota,

            'allCargo' => $cargoArray,
        );  
        return view(CargoManifestController::$path . 'CargoPengirimanManifest', [], $data);
    }

    /**
     * Display a page truck non manfest list
     *
     * @param  \Illuminate\Http\Request  $request 
     */
    public function pageCreateManifest(Request $request)
    {          
        $kodeKota = $request->user->kodeKota(); 

        $allWilayah = $request->user->allWilayah();  

        $data = array(
            'name' => $request->user->name,  

            'jenisUser' => $request->user->jenis_user,

            'isUserSuperadmin' => $request->user->is_user_superadmin,

            'kodeKota' => $kodeKota,

            'allWilayah' => $allWilayah,
        );
        return view(CargoManifestController::$path . 'CargoPengirimanManifestInput', [], $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request 
     */
    public function createManifest(Request $request)
    { 
        if($request->user->is_user_superadmin == 1){
            if(!$request->jenisPengiriman){
                $data = array();
                $data['message'] = 'Tujuan kosong';
                return redirect()->back()->withErrors($data)->withInput();
            }

            // pilihan jenis pengiriman dari superadmin
            if($request->jenisPengiriman == "truk"){
                $this->createManifestTruck($request);
            }else if($request->jenisPengiriman == "bus"){
                $this->createManifestBus($request);
            }
        }
        if($request->user->jenis_user == "truk"){
            return $this->createManifestTruck($request);
        }else if($request->user->jenis_user == "bus"){
            return $this->createManifestBus($request);
        }
        $data = array();
        $data['message'] = 'Error memilih jenis pengiriman';
        return redirect()->back()->withErrors($data)->withInput();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request 
     */
    public function createManifestTruck(Request $request)
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

            $tracking = new Tracking();
            $tracking->no_lmt = $request->no_lmt[$i];
            $tracking->id_message_tracking = 1;
            $tracking->id_status_pembayaran = $detail->id_status_pembayaran;
            
            $tracking->id_kode_kota_tujuan = $detail->id_kode_kota_tujuan;

            $tracking->id_user = $request->user->id;
            $tracking->save();
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
    public function createManifestBus(Request $request)
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

            $tracking = new Tracking();
            $tracking->no_lmt = $request->no_lmt[$i];
            $tracking->id_message_tracking = 1;
            $tracking->id_status_pembayaran = $detail->id_status_pembayaran;

            // $tracking->id_kode_kota_tujuan = $request->tujuan;
            $tracking->id_kode_kota_tujuan = $detail->id_kode_kota_tujuan;

            $tracking->id_user = $request->user->id;
            $tracking->save();
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
    public function storeManifestNote(Request $request)
    { 
        if($request->user->is_user_superadmin == 1 && !$request->jenisPengiriman){
            $data = array();
            $data['message'] = 'Error memilih jenis pengiriman';
            return redirect()->back()->withErrors($data)->withInput();
        }
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
        } catch (\Throwable $th) { 
            return abort(404);  
        }
        $pdf = null;
        if($request->user->jenis_user == "truk" || $request->jenisPengiriman == "truk"){
            // $this->storeTrukManifestNote($request);

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
        }else if($request->user->jenis_user == "bus" || $request->jenisPengiriman == "bus"){
            // $this->storeBusManifestNote($request);
            
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

            $pdf = PDF::loadView(CargoManifestController::$path . 'CargoPengirimanBusManifestNote',
            [
                "detail" => $detail, 
                "bus" => $bus, 
                "resume" => $resume,
                "user" => $request->user->kodeKota(),
            ]
            )
            ->SetPaper('a4') // a4 | portrait {widht: 708.66, height: 500.31500}
    
            ->setOption([
                'dpi' => 150, 
                'defaultFont' => 'sans-serif', 
                'isRemoteEnabled' => true, 
                'chroot' => "logo.png",
            ]);
        }
        if($pdf){
            return $pdf->stream(); 
        } 
        $data = array();
        $data['message'] = 'Error memilih jenis pengiriman';
        return redirect()->back()->withErrors($data)->withInput();
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
     * Generate a manfiest.
     *
     * @return \Barryvdh\DomPDF\Facade\Pdf
     */
    public function storeBusManifestNote(Request $request){     
            $no_manifest = decrypt($request->no_manifest);  
            $detail = CargoPengirimanDetail::
            selectRaw(
                'cargo_pengiriman_details.nama_pengirim,
                cargo_pengiriman_details.nama_penerima,
                cargo_pengiriman_details.no_resi,
                SUM(cargo_pengiriman_barangs.biaya) as biaya,
                SUM(cargo_pengiriman_barangs.jumlah_barang) as jumlah_barang,
                keterangan, 
                jenis_barang_detail,
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
        try {  
        } catch (\Throwable $th) {
            return abort(404);  
        }

        $pdf = PDF::loadView(CargoManifestController::$path . 'CargoPengirimanBusManifestNote',
        [
            "detail" => $detail, 
            "bus" => $bus, 
            "resume" => $resume,
            "user" => $request->user->kodeKota(),
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
            ->where('cargo_pengiriman_details.id_kode_kota_tujuan', $request->tujuan) 
            
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
            ->leftJoin("kode_kotas", "kode_kotas.id_kode_kota", "cargo_pengiriman_details.id_kode_kota_tujuan") 
            ->where('no_manifest', null)
            ->where('id_user', $request->user->id)
            ->where('cargo_pengiriman_details.id_kode_kota_tujuan', $request->tujuan) 
            
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
                DATE(trackings.created_at) as created',
            ) 
            ->leftJoin("trackings", "trackings.no_lmt", "cargo_pengiriman_details.no_lmt") 
            ->leftJoin("message_trackings", "message_trackings.id_message_tracking", "trackings.id_message_tracking") 
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
    
                $detail = CargoPengirimanDetail::
                selectRaw(
                    "
                    cargo_pengiriman_details.id_kode_kota_tujuan,
                    cargo_pengiriman_details.jenis_pengiriman,
                    MAX(trackings.id_message_tracking) as id_message_tracking_last"
                    ,
                    )
                ->leftJoin("trackings", "trackings.no_lmt", "cargo_pengiriman_details.no_lmt") 
                ->groupBy("trackings.id_message_tracking") 
                ->where('cargo_pengiriman_details.no_manifest', $no_manifest)
                ->where('trackings.id_message_tracking', "!=", null)
                ->first(); 
                
                if($detail->id_message_tracking_last == 1){
                    $cargoDetailArr = CargoPengirimanDetail::
                    select(
                        "cargo_pengiriman_details.no_lmt",
                    )
                    ->where('no_manifest', $no_manifest)
                    ->get();
                    foreach ($cargoDetailArr as $key => $cargoDetail) {  
                        $tracking = new Tracking();
                        $tracking->no_lmt = $cargoDetail->no_lmt;
                        $tracking->id_message_tracking = 2;
                        $tracking->id_status_pembayaran = null;
                        if($detail->jenis_pengiriman == "truk"){
                            $tracking->id_kode_kota_tujuan = $detail->id_kode_kota_tujuan;
                        }
                        else if($detail->jenis_pengiriman == "bus"){
                            // // $tracking->id_kode_kota_tujuan = $request->tujuan;
                            $tracking->id_kode_kota_tujuan = $detail->id_kode_kota_tujuan;
                        }
                        $tracking->id_user = $request->user->id;
                        $tracking->save();
                    }
                    return redirect('barang/manifest');
                }
                $data = array();
                $data['message'] = 'Kesalahan manifest';
                return redirect()->back()->withErrors($data);
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
    
                $detail = CargoPengirimanDetail::
                selectRaw(
                    "
                    cargo_pengiriman_details.id_kode_kota_tujuan,
                    MAX(trackings.id_message_tracking) as id_message_tracking_last,
                    cargo_pengiriman_details.created_at
                    ",
                    )
                ->leftJoin("trackings", "trackings.no_lmt", "cargo_pengiriman_details.no_lmt")  
                ->where('no_manifest', $no_manifest)
                ->where('trackings.id_message_tracking', "!=", null)
                ->first()
                ;  
                if($detail && $detail->id_message_tracking_last == 2){ 
                    // update
                    $detail = CargoPengirimanDetail::
                    select(
                        "cargo_pengiriman_details.no_lmt",
                        "cargo_pengiriman_details.id_kode_kota_tujuan",
                        "cargo_pengiriman_details.jenis_pengiriman",
                    )
                    ->where('no_manifest', $no_manifest)
                    ->get();
                    foreach ($detail as $cargoDetail) {  
                        $tracking = new Tracking();
                        $tracking->no_lmt = $cargoDetail["no_lmt"];
                        $tracking->id_message_tracking = 3;
                        $tracking->id_status_pembayaran = null; 

                        if($cargoDetail["jenis_pengiriman"] == "truk"){
                            $tracking->id_kode_kota_tujuan = $cargoDetail["id_kode_kota_tujuan"];
                        }
                        else if($cargoDetail["jenis_pengiriman"] == "bus"){
                            // $tracking->id_kode_kota_tujuan = $request->tujuan;
                            $tracking->id_kode_kota_tujuan = $cargoDetail["id_kode_kota_tujuan"];
                        }
                        $tracking->id_user = $request->user->id;
                        $tracking->save();
                    }
                    return redirect('barang/manifest');
                }
                $data = array();
                $data['message'] = 'Kesalahan manifest';
                return redirect()->back()->withErrors($data);
            } catch (\Throwable $th) { 
                return abort(404);  
            }
        }
        $data = array();
        $data['message'] = 'Manifest tidak ditemukan';
        
        return redirect()->back()->withErrors($data);
    }
}