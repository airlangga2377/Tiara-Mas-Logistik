<?php

namespace App\Http\Controllers;

use App\Models\Cargo\CargoPengirimanDetail;
use App\Models\Cargo\TruckTracking;
use App\Models\Cargo\CargoPengirimanBarang;
use App\Models\Cargo\Distributor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;

class CargoPengirimanTrukController extends Controller
{ 
    /**
     * Display a page pengiriman
     *
     * @return \Illuminate\Http\Response
     */
    protected function page(Request $request)
    {
        $kodeKota = $request->user->kodeKota(); 
        $data = array(
            'name' => $request->user->name,
            
            'isUserSuperadmin' => $request->user->is_user_superadmin,

            'kodeKota' => $kodeKota,
        );  
        return view('page.admin.CargoPengirimanTruk', [], $data); 
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

            'asal' => $request->user->is_user_superadmin == 1 ? $request->asal : $request->user->kodeKota()->kota,
            'tujuan' => $request->tujuan,
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
     * Generate a delivery note.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeTrukDeliveryNote(Request $request){   
        $data = array();
        
        try { 
            $detail = CargoPengirimanDetail::where('no_lmt', decrypt($request->no_lmt))->first();
        } catch (\Throwable $th) {
            return abort(404);  
        }

        $data = $detail->barangs($request->no_lmt);
        $detail->summary($request->no_lmt);

        // $created_at = $detail->created_at; 
        $detail->created = date_format(date_create($detail->created_at->toDateString(), timezone_open("Asia/Jakarta")), 'd F Y'); 

        if(count($data) != 0 && $detail->no_lmt){  
            $pdf = PDF::loadView('page.admin.CargoPengirimanTrukDeliveryNote', ["data" => $data, "detail" => $detail, "user" => $request->user])
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
            select(
                "cargo_pengiriman_details.no_lmt",
                "is_lunas",
                "is_diterima",
                "message_trackings.id_message_tracking",
                "status_pembayarans.id_status_pembayaran",
                "cargo_pengiriman_details.created_at",
            )
            ->leftJoin("truck_trackings", "truck_trackings.no_lmt", "cargo_pengiriman_details.no_lmt") 
            ->leftJoin("message_trackings", "message_trackings.id_message_tracking", "truck_trackings.id_message_tracking") 
            ->leftJoin("status_pembayarans", "status_pembayarans.id_status_pembayaran", "cargo_pengiriman_details.id_status_pembayaran")
            ->groupBy("message_trackings.id_message_tracking") 
            ->orderBy('message_trackings.id_message_tracking', 'desc')
            ->where('cargo_pengiriman_details.no_lmt', decrypt($request->no_lmt))
            ->first()
            ; 

            // id_message_tracking = 3 = "barang sudah sampai tujuan"
            if($cargoDetail->is_diterima == null && ($cargoDetail->id_message_tracking == 3 || $cargoDetail->id_message_tracking == 5 || $cargoDetail->id_message_tracking == 6)){ 
                CargoPengirimanDetail::where("no_lmt", $cargoDetail->no_lmt)->update(['is_diterima' => "diterima"]); 
            
                $tracking = new TruckTracking();
                $tracking->no_lmt = $cargoDetail->no_lmt;
                $tracking->id_message_tracking = 4;
                $tracking->id_status_pembayaran = $cargoDetail->is_lunas ? null : $cargoDetail->id_status_pembayaran;
                $tracking->id_user = $request->user->id;
                $tracking->save();

                return redirect('barang');
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
                asal,
                tujuan,
                MAX(message_trackings.id_message_tracking) as id_message_tracking_last,
                status_pembayarans.id_status_pembayaran,
                cargo_pengiriman_details.created_at",
            )
            ->leftJoin("truck_trackings", "truck_trackings.no_lmt", "cargo_pengiriman_details.no_lmt") 
            ->leftJoin("message_trackings", "message_trackings.id_message_tracking", "truck_trackings.id_message_tracking") 
            ->leftJoin("status_pembayarans", "status_pembayarans.id_status_pembayaran", "cargo_pengiriman_details.id_status_pembayaran")  
            ->where('cargo_pengiriman_details.no_lmt', decrypt($request->no_lmt))
            ->first()
            ; 

            $isBayarTujuan = $cargoDetail->id_message_tracking_last == 1;
            $isPiutang = $cargoDetail->id_message_tracking_last == 3; 
            
            if($cargoDetail && !$cargoDetail->is_lunas && ($isBayarTujuan || $isPiutang)){ 
                CargoPengirimanDetail::where("no_lmt", $cargoDetail->no_lmt)->update(['is_lunas' => "lunas"]); 
                
                $tracking = new TruckTracking();
                $tracking->no_lmt = $cargoDetail->no_lmt;

                if($request->user->kodeKota()->kota == $cargoDetail->tujuan){
                    // add more strict && 
                    $tracking->id_message_tracking = 6;
                    $tracking->id_status_pembayaran = 4;
                } 
                else if($request->user->kodeKota()->kota == $cargoDetail->asal || $request->user->name == "superadmin"){
                    // add more strict && 
                    $tracking->id_message_tracking = 5;
                    $tracking->id_status_pembayaran = 2;
                }
                
                $tracking->id_user = $request->user->id;
                $tracking->save();
                return redirect('barang');
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
    public function destroy(Request $request)
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
                DATE(truck_trackings.created_at) as created',
            ) 
            ->leftJoin("truck_trackings", "truck_trackings.no_lmt", "cargo_pengiriman_details.no_lmt") 
            ->leftJoin("message_trackings", "message_trackings.id_message_tracking", "truck_trackings.id_message_tracking") 
            ->leftJoin("status_pembayarans", "status_pembayarans.id_status_pembayaran", "truck_trackings.id_status_pembayaran") 
            ->leftJoin("trucks", "trucks.no_pol", "cargo_pengiriman_details.no_pol") 
            ->where('cargo_pengiriman_details.no_lmt', $no_lmt)
            ->get();
        } catch (\Throwable $th) {
            return abort(404);  
        }

        return response()->json(["data" => $data]);

    }
}
