<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Bus\CargoPengirimanBusController;
use App\Models\Cargo\CargoPengirimanDetail;
use App\Models\Cargo\CargoPengirimanBarang;
use App\Models\Cargo\Distributor;
use App\Http\Controllers\Controller;
use App\Models\Cargo\Tracking;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;

class CargoPengirimanController extends Controller
{ 
    public static $path = "page.admin.bus.resi.";

    /**
     * Display a page pengiriman
     *
     * @return \Illuminate\Http\Response
     */
    protected function pageTruck(Request $request)
    {
        $allWilayah = $request->user->allWilayah();  

        $kodeKota = $request->user->kodeKota(); 

        $data = array(
            'name' => $request->user->name,
            
            'isUserSuperadmin' => $request->user->is_user_superadmin,

            'jenisUser' => $request->user->jenis_user,

            'kodeKota' => $kodeKota,

            'allWilayah' => $allWilayah,
        );  
        return view('page.admin.truk.CargoPengirimanTruk', [], $data); 
    } 
    protected function pageBus(Request $request)
    {
        $allWilayah = $request->user->allWilayah();  

        $kodeKota = $request->user->kodeKota(); 

        $data = array(
            'name' => $request->user->name,
            'jenisUser' => $request->user->jenis_user,
            'isUserSuperadmin' => $request->user->is_user_superadmin,
            'allWilayah' => $allWilayah,
            'kodeKota' => $kodeKota,
        );
        return view('page.admin.bus.CargoPengirimanBus', [], $data); 
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function index(Request $request)
    {
        $request->allDetailCargoPengirimanBarang = $request->user->allDetailCargoPengirimanBarang;
        return response($request->allDetailCargoPengirimanBarang);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  Request  $request
     * @return bool
     */
    protected function validator(Request $request)
    {
        return $request->validate([
            'namaPengirim' => ['required', 'string', 'max:255'], 
            'nomorPengirim' => ['required', 'numeric', 'min:1'], 

            'namaPenerima' => ['required', 'string', 'max:255'], 
            'nomorPenerima' => ['required', 'numeric', 'min:1'],   

            'jenisPengiriman' => ['required', 'string'],  
            
            'tujuan' => ['required', 'string'],  

            'jenisBarang' => ['required', 'string'],  
            'jumlahBarang' => ['required', 'numeric', 'min:1'],  
            'keterangan' => ['max:255'],   

            'biaya' => ['numeric', 'min:1'],  
        ],
        [ 
            'namaPengirim.required' => "Nama pengirim kosong",

            'nomorPengirim.required' => "Nomor pengirim kosong",
            'nomorPengirim.numeric' => "Nomor pengirim hanya boleh angka",
            'nomorPengirim.max' => "Maksimal nomor pengirim 13 angka",
            'nomorPengirim.min' => "Minimal nomor pengirim 1 angka",

            'namaPenerima.required' => "Nama penerima kosong",

            'nomorPenerima.required' => "Nomor penerima kosong",
            'nomorPenerima.numeric' => "Nomor penerima hanya boleh angka",
            'nomorPengirim.max' => "Maksimal nomor pengirim 13 angka",
            'nomorPenerima.min' => "Minimal nomor penerima 1 angka",
            
            'jenisPengiriman.required' => "Jenis pengiriman kosong",
            'jenisPengiriman.string' => "Jenis pengiriman tidak boleh angka",

            'tujuan.required' => "Tujuan kosong",
            'tujuan.string' => "Tujuan tidak boleh angka",

            'jenisBarang.required' => "Jenis barang kosong",
            'jenisBarang.string' => "Jenis barang tidak boleh angka",

            'jumlahBarang.required' => "Jumlah barang kosong",

            'keterangan.max' => "Keterangan melebihi batas",
 
            'biaya.numeric' => "Biaya hanya boleh angka", 
            'biaya.min' => "Minimal biaya berisi 1 rupiah",
        ]
        );
    } 

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  Request  $request
     * @return bool
     */
    protected function validatorMany(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'namaPengirim' => ['required', 'string', 'max:255'], 
            'nomorPengirim' => ['required', 'numeric', 'min:1'], 

            'namaPenerima' => ['required', 'string', 'max:255'], 
            'nomorPenerima' => ['required', 'numeric', 'min:1'],   
            
            'tujuan' => ['required', 'string'],  

            'jenisDetail' => ['required', 'string'],  
        ],
        [ 
            'namaPengirim.required' => "Nama pengirim kosong",
            'namaPengirim.max' => "Nama pengirim melebihi maksimal",

            'nomorPengirim.required' => "Nomor pengirim kosong",
            'nomorPengirim.numeric' => "Nomor pengirim hanya boleh angka",
            'nomorPengirim.min' => "Minimal nomor pengirim 1 angka",

            'namaPenerima.required' => "Nama penerima kosong",
            'namaPenerima.max' => "Nama penerima melebihi maksimal",

            'nomorPenerima.required' => "Nomor penerima kosong",
            'nomorPenerima.numeric' => "Nomor penerima hanya boleh angka",
            'nomorPenerima.min' => "Minimal nomor penerima 1 angka", 

            'tujuan.required' => "Tujuan kosong",
            'tujuan.string' => "Tujuan tidak boleh angka",

            'jenisDetail.required' => "Jenis detail kosong",
            'jenisDetail.string' => "Jenis detail tidak boleh angka",
        ]
        );
        if($validator->fails()){ 
            return $validator->errors(); 
        }
        return false;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    } 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request 
     * @return redirect
     */
    public function storeTruk(Request $request)
    {
        // superadmin
        if($request->user->is_user_superadmin && !$request->asal){
            $data = array();
            $data['asalError'] = 'Asal kosong';
            return redirect()->back()->withErrors($data)->withInput();
        }

        $dataValid = array();
        $jenisBarangValid = 0;

        $validator = $this->validatorMany($request);
        if($validator){
            return redirect()->back()->withErrors($this->validatorMany($request))->withInput(); 
        } 

        $no_resi = $no_lmt = CargoPengirimanBarang::select('no_lmt')->max('no_lmt') ? CargoPengirimanBarang::select('no_lmt')->max('no_lmt') + 1 : 1;

        for ($i=0; $i < count($request->jenisBarang); $i++) {    
            if($request->jenisBarang[$i]){
                $jenisBarangValid++;
            }

            $kubikasi = 0;
            $berat = 0;
    
            // rumus kubikasi
            if(
                $request->kubikasiPanjang[$i]
                && $request->kubikasiLebar[$i]
                && $request->kubikasiTinggi[$i]
            ){
                $kubikasi = 
                $request->kubikasiPanjang[$i]
                * $request->kubikasiLebar[$i]
                * $request->kubikasiTinggi[$i]
                * 450000
                ;
            } 
            
            // rumus berat
            if(
                $request->jenisBarang[$i]
                && $request->berat[$i] 
            ){ 
                if($request->jenisBarang[$i] == "besi"){
                    $berat = $request->berat[$i]  * 1000;
                } else if($request->jenisBarang[$i] == "tidak besi"){
                    $berat = $request->berat[$i]  * 800;
                }
            }  
    
            $request->jenisBiaya = "kubikasi";
    
            // menentukan label jenis biaya yang digunakan
            if($kubikasi < $berat){
                $request->jenisBiaya = "berat"; 
            }   
    
            $biaya = 0;
            $isPengecualian = null;

            // jika tidak kosong dan pengecualian tidak kosong
            // menentukan biaya yang digunakan  
            if($request->biaya[$i]){
                $isPengecualian = 'pengecualian';
                $biaya = $request->biaya[$i]; 
            }
            
            if(!$request->biaya[$i] && $kubikasi < $berat){ 
                $biaya = $berat;
            }  
            else if(!$request->biaya[$i]){
                $biaya = $kubikasi; 
            }   

            $request->jenisPengirim = (Distributor::findName($request->namaPengirim)) ? "distributor" : "umum"; 

            if($biaya){
                $pengiriman = new CargoPengirimanBarang([     
                    'jumlah_barang' => $request->jumlahBarang[$i],
                    'code' => $request->code[$i],
                    'jenis_barang' => $request->jenisBarang[$i],
    
                    'panjang' => $request->kubikasiPanjang[$i],
                    'lebar' => $request->kubikasiLebar[$i],
                    'tinggi' => $request->kubikasiTinggi[$i],
                    'berat' => $request->berat[$i],
    
                    'biaya' => $biaya,
                ]);
                array_push($dataValid, $pengiriman);
            }

            sleep(0.3);
        }     

        // add pengiriman detail
        $pengirimanDetail = new CargoPengirimanDetail([
            'no_resi' => $no_resi,
            'no_lmt' => $no_lmt,

            'nama_pengirim' => $request->namaPengirim,
            'nomor_pengirim' => $request->nomorPengirim,
            'nama_penerima' => $request->namaPenerima,
            'nomor_penerima' => $request->nomorPenerima,

            // 2 pembayaran di kantor surabaya
            'is_lunas' => ($request->statusPembayaran == 2 || $request->statusPembayaran == 4) ? "lunas" : null, 

            'is_pengecualian' => $isPengecualian,

            'jenis_pengirim' => $request->jenisPengirim?? 'umum',
            'jenis_pengiriman' => "truk",
            'jenis_biaya' => $request->jenisBiaya,
            'id_status_pembayaran' => $request->statusPembayaran,

            'id_kode_kota_asal' => $request->user->is_user_superadmin == 1 ? $request->asal : $request->user->id_kode_kota,
            'id_kode_kota_tujuan' => $request->tujuan,

            'keterangan' => $request->keterangan, 
            'jenis_barang_detail' => $request->jenisDetail, 

            'id_user' => $request->user->id, 
        ]);

        if(count($dataValid) == $jenisBarangValid && $pengirimanDetail){ 
            for ($i=0; $i < $jenisBarangValid; $i++) { 
                $dataValid[$i]->no_resi = $pengirimanDetail->no_resi;
                $dataValid[$i]->no_lmt = $pengirimanDetail->no_lmt;
                $dataValid[$i]->save();
            }

            $pengirimanDetail->save(); 
            
            $request->no_lmt = encrypt($no_lmt);  
            return redirect()->back()->with(["message" => "Berhasil memasukkan data", "no_lmt" => $request->no_lmt]);
            // return redirect()->action("CargoPengirimanTrukController@storeTrukDeliveryNote", ["no_lmt" => $request->no_lmt]);
        }
        $data = array();
        $data['message'] = 'Error pada input';
        return redirect()->back()->withErrors($data)->withInput();
    }
    
    /**
     * Display a page pengiriman
     *
     * @param  \Illuminate\Http\Request  $request 
     * @return redirect
     */
    protected function storeBus(Request $request)
    {
        $dataValid = array();
        $jenisBarangValid = 0;

        // $validator = $this->validatorMany($request);
        // if($validator){
        //     return redirect()->back()->withErrors($this->validatorMany($request))->withInput(); 
        // } 
        $no_lmt = $no_resi = CargoPengirimanBarang::select('no_lmt')->max('no_lmt') ? CargoPengirimanBarang::select('no_lmt')->max('no_lmt') + 1 : 1;

        for ($i=0; $i < count($request->jenisBarang); $i++) {    
            if($request->jenisBarang[$i]){
                $jenisBarangValid++;
            }

            $kubikasi = 0;
            $berat = 0;
    
            // rumus kubikasi
            if(
                $request->panjangBarang[$i]
                && $request->lebarBarang[$i]
                && $request->tinggiBarang[$i]
            ){
                $kubikasi = 
                $request->panjangBarang[$i]
                * $request->lebarBarang[$i]
                * $request->tinggiBarang[$i]
                * 450000
                ;
            }

            // rumus berat
            if(
                $request->jenisBarang
                && $request->berat[$i] 
            ){ 
                if($request->jenisBarang[$i] == "besi"){
                    $berat = $request->berat[$i]  * 1000;
                } else if($request->jenisBarang[$i] == "tidak besi"){
                    $berat = $request->berat[$i]  * 800;
                }
            }  
            $request->jenisBiaya = "kubikasi";
    
            // menentukan label jenis biaya yang digunakan
            if($kubikasi < $berat){
                $request->jenisBiaya = "berat"; 
            }   
    
            $biaya = 0;
            $isPengecualian = null;

            // jika tidak kosong dan pengecualian tidak kosong
            // menentukan biaya yang digunakan  
            if($request->biaya[$i]){
                $isPengecualian = 'pengecualian';
                $biaya = $request->biaya[$i]; 
            }
            
            if(!$request->biaya[$i] && $kubikasi < $berat){ 
                $biaya = $berat;
            }  
            else if(!$request->biaya[$i]){
                $biaya = $kubikasi; 
            }   

            $request->jenisPengirim = (Distributor::findName($request->namaPengirim)) ? "distributor" : "umum"; 

            if($biaya){
                
                $pengiriman = new CargoPengirimanBarang([     
                    'jumlah_barang' => $request->jumlahBarang[$i],
                    // 'code' => $request->code[$i],
                    'jenis_barang' => $request->jenisBarang[$i],
                     
                    
                    'panjang' => $request->panjangBarang[$i],
                    'lebar' => $request->lebarBarang[$i],
                    'tinggi' => $request->tinggiBarang[$i],
                    'berat' => $request->berat[$i],
    
                    'biaya' => $biaya,
                ]);
                array_push($dataValid, $pengiriman);
            }

            sleep(0.3);
        }    

        // add pengiriman detail
        $pengirimanDetail = new CargoPengirimanDetail([
            'no_resi' => $no_resi,
            'no_lmt' => $no_lmt,

            'nama_pengirim' => $request->namaPengirim,
            'nomor_pengirim' => $request->nomorPengirim,
            'nama_penerima' => $request->namaPenerima,
            'nomor_penerima' => $request->nomorPenerima,

            // 2 pembayaran di kantor surabaya
            'is_lunas' => ($request->statusPembayaran == 2 || $request->statusPembayaran == 4) ? "lunas" : null, 

            'is_pengecualian' => $isPengecualian,

            'jenis_pengirim' => $request->jenisPengirim?? 'umum',
            'jenis_pengiriman' => "bus",
            'jenis_biaya' => $request->jenisBiaya,
            'id_status_pembayaran' => $request->statusPembayaran,

            'id_kode_kota_asal' => $request->user->is_user_superadmin == 1 ? $request->asal : $request->user->id_kode_kota,
            'id_kode_kota_tujuan' => $request->tujuan,

            'id_user' => $request->user->id, 
        ]);

        if(count($dataValid) == $jenisBarangValid && $pengirimanDetail){ 
            for ($i=0; $i < $jenisBarangValid; $i++) { 
                $dataValid[$i]->no_resi = $pengirimanDetail->no_resi;
                $dataValid[$i]->no_lmt = $pengirimanDetail->no_lmt;
                $dataValid[$i]->save();
            }
            $pengirimanDetail->save(); 
            
            $request->no_lmt = encrypt($no_lmt);  
            return redirect()->back()->with(["message" => "Berhasil memasukkan data", "no_lmt" => $request->no_lmt]);
            // return redirect()->action("CargoPengirimanTrukController@storeTrukDeliveryNote", ["no_lmt" => $request->no_lmt]);
        }
        $data = array();
        $data['message'] = 'Error pada input';
        return redirect()->back()->withErrors($data)->withInput(); 
    }

    /**
     * Generate a delivery note.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeTrukDeliveryNote(Request $request){   
        $data = array();
        
        try { 
            $detail = CargoPengirimanDetail::
                selectRaw(
                    "
                    cargo_pengiriman_details.*,
                    kode_kotas.kota as tujuan,
                    trucks.*
                    "
                )
                ->leftJoin("kode_kotas", "kode_kotas.id_kode_kota", "cargo_pengiriman_details.id_kode_kota_tujuan") 
                ->leftJoin("trucks", "trucks.no_pol", "cargo_pengiriman_details.no_pol") 
                ->where('no_lmt', decrypt($request->no_lmt))
                ->first();
        } catch (\Throwable $th) {
            return abort(404);  
        }

        $data = $detail->barangs($request->no_lmt);

        // $created_at = $detail->created_at; 
        $detail->created = date_format(date_create($detail->created_at->toDateString(), timezone_open("Asia/Jakarta")), 'd F Y'); 

        if(count($data) != 0 && $detail->no_lmt){  
            $pdf = PDF::loadView('page.admin.truk.CargoPengirimanTrukDeliveryNote', ["data" => $data, "detail" => $detail, "user" => $request->user])
            ->SetPaper([0.0, 0.0, 708.66, 1000.63 / 2]) // a4 | portrait {widht: 708.66, height: 500.31500}

            ->setOption([
                'dpi' => 150, 
                'defaultFont' => 'sans-serif', 
                'isRemoteEnabled' => true, 
                'chroot' => "logo.png",
            ]);
            
            return $pdf->stream();
        }
        return abort(404);
    }

    /**
     * Generate a delivery note.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeBusResiNote(Request $request){   
        $data = array();
        try {
            $detail = CargoPengirimanDetail::
                selectRaw(
                    "
                    cargo_pengiriman_details.*,
                    kode_kotas.kota as tujuan,
                    bus.*,
                    status_pembayarans.pesan
                    "
                )
                ->leftJoin("status_pembayarans", "status_pembayarans.id_status_pembayaran", "cargo_pengiriman_details.id_status_pembayaran") 
                ->leftJoin("kode_kotas", "kode_kotas.id_kode_kota", "cargo_pengiriman_details.id_kode_kota_tujuan") 
                ->leftJoin("bus", "bus.no_pol", "cargo_pengiriman_details.no_pol") 
                ->where('no_lmt', decrypt($request->no_lmt))
                ->first();
        } catch (\Throwable $th) {
            return abort(404);  
        }
        $data = $detail->barang($request->no_lmt);
        $detail->user = $request->user->kodeKota();

        $detail->created = date_format(date_create($detail->created_at->toDateString(), timezone_open("Asia/Jakarta")), 'd F Y'); 

        $asal = CargoPengirimanDetail::
        selectRaw(
            "
            kode_kotas.kota as asal
            "
        )
        ->leftJoin("kode_kotas", "kode_kotas.id_kode_kota", "cargo_pengiriman_details.id_kode_kota_asal") 
        ->where('no_lmt', decrypt($request->no_lmt))
        ->first()->asal;

        if($data && $detail->no_lmt){  
            $pdf = PDF::loadView(CargoPengirimanBusController::$path .'CetakResi', [
                "data" => $data, 
                "detail" => $detail,
                "user" => $request->user, 
                "asal" => $asal
            ])
            ->SetPaper([0.0, 0.0, 708.66, 920.63 / 2]) // a4 | portrait {widht: 708.66, height: 610.000}

            ->setOption([
                'dpi' => 150, 
                'defaultFont' => 'sans-serif', 
                'isRemoteEnabled' => true, 
                'chroot' => "logo.png",
            ]);
            
            return $pdf->stream();
        }
        return abort(404);
    }

    /**
     * Generate a delivery note.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeBusBarangNote(Request $request){   
        $data = array();
        
        try { 
            $detail = CargoPengirimanDetail::
                selectRaw(
                    "
                    cargo_pengiriman_details.*,
                    kode_kotas.kota as tujuan,
                    bus.*
                    "
                )
                ->leftJoin("kode_kotas", "kode_kotas.id_kode_kota", "cargo_pengiriman_details.id_kode_kota_tujuan") 
                ->leftJoin("bus", "bus.no_pol", "cargo_pengiriman_details.no_pol") 
                ->where('no_lmt', decrypt($request->no_lmt))
                ->first();
        } catch (\Throwable $th) {
            return abort(404);  
        }

        $data = $detail->barang($request->no_lmt);

        // $created_at = $detail->created_at; 
        $detail->created = date_format(date_create($detail->created_at->toDateString(), timezone_open("Asia/Jakarta")), 'd F Y'); 

        if($data && $detail->no_lmt){  
            $pdf = PDF::loadView(CargoPengirimanBusController::$path . 'CetakBarang', [
                "data" => $data, 
                "detail" => $detail, 
                "user" => $request->user
            ])
            ->SetPaper('A6','portrait') // a4 | portrait {widht: 377.95275591, height: 566.92913386}

            ->setOption([
                'dpi' => 150, 
                'defaultFont' => 'sans-serif', 
                'isRemoteEnabled' => true, 
                'chroot' => "logo.png",
            ]);
            
            return $pdf->stream();
        }
        return abort(404);
        // return $pdf->download("tes.pdf");
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\CargoPengirimanBarang  $cargoPengirimanBarang
     * @return \Illuminate\Http\Response
     */
    public function show(CargoPengirimanBarang $cargoPengirimanBarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CargoPengirimanBarang  $cargoPengirimanBarang
     * @return \Illuminate\Http\Response
     */
    public function edit(CargoPengirimanBarang $cargoPengirimanBarang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request 
     */
    public function update(Request $request)
    { 
        $data = array();
        $data['message'] = 'Barang tidak ditemukan';
        
        return redirect()->back()->withErrors($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request 
     */
    public function updateDiterima(Request $request)
    {
        // by no resi
        if($request->no_lmt){
            $cargoDetail = CargoPengirimanDetail::
            selectRaw(
                "cargo_pengiriman_details.no_lmt,
                is_lunas,
                is_diterima,
                jenis_pengiriman,
                cargo_pengiriman_details.id_kode_kota_tujuan,
                MAX(trackings.id_message_tracking) as id_message_tracking_last,
                status_pembayarans.id_status_pembayaran,
                cargo_pengiriman_details.created_at",
            )
            ->leftJoin("trackings", "trackings.no_lmt", "cargo_pengiriman_details.no_lmt") 
            ->leftJoin("message_trackings", "message_trackings.id_message_tracking", "trackings.id_message_tracking") 
            ->leftJoin("status_pembayarans", "status_pembayarans.id_status_pembayaran", "cargo_pengiriman_details.id_status_pembayaran")
            ->groupBy("message_trackings.id_message_tracking") 
            ->orderBy('message_trackings.id_message_tracking', 'desc')
            ->where('cargo_pengiriman_details.no_lmt', decrypt($request->no_lmt))
            ->first()
            ; 

            // id_message_tracking = 3 = "barang sudah sampai tujuan"
            if($cargoDetail && $cargoDetail->is_diterima == null && $cargoDetail->id_message_tracking_last == 3){ 
                CargoPengirimanDetail::where("no_lmt", $cargoDetail->no_lmt)->update(['is_diterima' => "diterima"]); 
            
                $tracking = new Tracking();
                $tracking->no_lmt = $cargoDetail->no_lmt;
                $tracking->id_message_tracking = 4;
                $tracking->id_status_pembayaran = $cargoDetail->is_lunas ? null : $cargoDetail->id_status_pembayaran;

                // select jenis pengiriman
                if($cargoDetail->jenis_pengiriman == "truk"){
                    $tracking->id_kode_kota_tujuan = $cargoDetail->id_kode_kota_tujuan;
                }
                else if($cargoDetail->jenis_pengiriman == "bus"){
                    // $tracking->id_kode_kota_tujuan = $request->tujuan;
                    $tracking->id_kode_kota_tujuan = $cargoDetail->id_kode_kota_tujuan;
                }
                $tracking->id_user = $request->user->id;
                $tracking->save();

                return redirect('barang');
            }
            if($cargoDetail->is_diterima){
                $data = array();
                $data['message'] = 'Barang sudah diterima';
                
                return redirect()->back()->withErrors($data);
            }
        }
        $data = array();
        $data['message'] = 'Barang tidak ditemukan';
        
        return redirect()->back()->withErrors($data);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request 
     */
    public function updateLunas(Request $request)
    {
        // by no resi
        if($request->no_lmt){
            $cargoDetail = CargoPengirimanDetail::
            selectRaw(
                "cargo_pengiriman_details.no_lmt,
                is_lunas,
                cargo_pengiriman_details.id_kode_kota_asal,
                cargo_pengiriman_details.id_kode_kota_tujuan,
                cargo_pengiriman_details.jenis_pengiriman,
                cargo_pengiriman_details.id_status_pembayaran,
                cargo_pengiriman_details.created_at",
            )
            ->leftJoin("trackings", "trackings.no_lmt", "cargo_pengiriman_details.no_lmt") 
            ->where('cargo_pengiriman_details.no_lmt', decrypt($request->no_lmt))
            ->first()
            ; 

            $isBayarTujuan = $cargoDetail->id_status_pembayaran == 1;
            $isPiutang = $cargoDetail->id_status_pembayaran == 3; 
            
            if($cargoDetail && !$cargoDetail->is_lunas && ($isBayarTujuan || $isPiutang)){ 
                CargoPengirimanDetail::where("no_lmt", $cargoDetail->no_lmt)->update(['is_lunas' => "lunas"]); 
                
                $tracking = new Tracking();
                $tracking->no_lmt = $cargoDetail->no_lmt;

                if($request->user->id_kode_kota == $cargoDetail->id_kode_kota_tujuan){
                    $tracking->id_message_status_pembayaran = 6;
                    $tracking->id_status_pembayaran = 4;
                } 
                else if($request->user->id_kode_kota == $cargoDetail->id_kode_kota_asal || $request->user->name == "superadmin"){
                    $tracking->id_message_status_pembayaran = 5;
                    $tracking->id_status_pembayaran = 2;
                }

                // select jenis pengiriman
                if($cargoDetail->jenis_pengiriman == "truk"){
                    $tracking->id_kode_kota_tujuan = $cargoDetail["id_kode_kota_tujuan"];
                }
                else if($cargoDetail->jenis_pengiriman == "bus"){
                    // $tracking->id_kode_kota_tujuan = $request->tujuan;
                    $tracking->id_kode_kota_tujuan = $cargoDetail["id_kode_kota_tujuan"];
                }
                
                $tracking->id_user = $request->user->id;
                $tracking->save();
                return redirect('barang');
            }
            if($cargoDetail->is_lunas){
                $data = array();
                $data['message'] = 'Barang sudah lunas';
                
                return redirect()->back()->withErrors($data);
            }
        }
        $data = array();
        $data['message'] = 'Barang tidak ditemukan';
        
        return redirect()->back()->withErrors($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request 
     */
    public function destroyDetail(Request $request)
    { 
        // by no resix
        if($request->no_lmt){
            $cargoDetail = CargoPengirimanDetail::where('no_lmt', decrypt($request->no_lmt))->delete();
            if($cargoDetail){
                return redirect('barang');
            }
        }
        $data = array();
        $data['message'] = 'Barang tidak ditemukan';
        
        return redirect()->back()->withErrors($data);
    }

    /**
     * get resi for tracking
     *
     * @param  \Illuminate\Http\Request  $request 
     */
    public function getResiTracking(Request $request)
    { 
        try {
            $no_lmt = decrypt($request->no_lmt); 
    
            // Untuk membuat manifest
            $data = CargoPengirimanDetail::
            selectRaw(
                '
                message_trackings.pesan,  
                status_pembayarans.pesan as pembayaran,  
                DATE(trackings.created_at) as created',
            ) 
            ->leftJoin("trackings", "trackings.no_lmt", "cargo_pengiriman_details.no_lmt") 
            ->leftJoin("message_trackings", "message_trackings.id_message_tracking", "trackings.id_message_tracking") 
            ->leftJoin("status_pembayarans", "status_pembayarans.id_status_pembayaran", "trackings.id_status_pembayaran") 
            ->leftJoin("trucks", "trucks.no_pol", "cargo_pengiriman_details.no_pol") 
            ->where('cargo_pengiriman_details.no_lmt', $no_lmt)
            ->groupBy("trackings.id_tracking")
            ->get();
        } catch (\Throwable $th) {
            return abort(404);  
        }

        return response()->json(["data" => $data]);

    }
}
