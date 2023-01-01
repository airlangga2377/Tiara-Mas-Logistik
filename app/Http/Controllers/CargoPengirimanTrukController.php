<?php

namespace App\Http\Controllers;

use App\Models\Cargo\CargoPengirimanBarang;
use App\Models\Cargo\Distributor;
use App\Http\Controllers\Controller;
use App\Models\Cargo\CargoPengirimanDetail;
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
        $data = array(
            'name' => $request->user->name 
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
        $dataValid = array();
        $jenisBarangValid = 0;

        $validator = $this->validatorMany($request);
        if($validator){
            return redirect()->back()->withErrors($this->validatorMany($request))->withInput(); 
        } 

        $no_lmt = CargoPengirimanBarang::select('no_lmt')->max('no_lmt') ? CargoPengirimanBarang::select('no_lmt')->max('no_lmt') + 1 : 1;
        $no_resi = CargoPengirimanBarang::select('no_resi')->max('no_resi') ? CargoPengirimanBarang::select('no_resi')->max('no_resi') + 1 : 1;

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

            'is_lunas' => $request->isLunas, 

            'is_pengecualian' => $isPengecualian,

            'jenis_pengirim' => $request->jenisPengirim?? 'umum',
            'jenis_pengiriman' => "truk",
            'jenis_biaya' => $request->jenisBiaya,

            'tujuan' => $request->tujuan,
            'keterangan' => $request->keterangan, 

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
            $cargoDetail = CargoPengirimanDetail::where('no_lmt', decrypt($request->no_lmt))->update(array("is_diterima" => "diterima"));
        
            if($cargoDetail){ 
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
            $cargoDetail = CargoPengirimanDetail::where('no_lmt', decrypt($request->no_lmt))->update(array("is_lunas" => "lunas"));
            
            if($cargoDetail){ 
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
}
