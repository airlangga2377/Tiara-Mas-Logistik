<?php

namespace App\Http\Controllers\Bus;

use DB;
use Milon\Barcode\DNS1D;
use Milon\Barcode\DNS2D;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Cargo\Bus\Wilayah;
use App\Models\Cargo\Distributor;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Cargo\StatusPembayaran;
use Milon\Barcode\Facades\DNS1DFacade;
use App\Models\Cargo\Bus\GoodsCategory;
use App\Models\Cargo\Bus\PengirimanBus;
use App\Models\Cargo\CargoPengirimanBarang;
use App\Models\Cargo\CargoPengirimanDetail;

class CargoPengirimanBusController extends Controller
{
    public static $path = "page.admin.Bus.resi.";

    protected function page(Request $request)
    {
        $allWilayah = $request->user->allWilayah();  
        $data = array(
            'name' => $request->user->name,
            'jenisUser' => $request->user->jenis_user,
            'isUserSuperadmin' => $request->user->is_user_superadmin,
            'allWilayah' => $allWilayah
        );
        return view('page.admin.Bus.CargoPengirimanBus', [], $data); 
    }
    /**
     * Display a page pengiriman
     *
     * @return \Illuminate\Http\Response
     */
    protected function pagecreate(Request $request)
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

            'keterangan' => $request->keterangan,
            'nama_pengirim' => $request->namaPengirim,
            'nomor_pengirim' => $request->nomorPengirim,
            'nama_penerima' => $request->namaPenerima,
            'nomor_penerima' => $request->nomorPenerima,
            // 2 pembayaran di kantor surabaya
            'is_lunas' => ($request->statusPembayaran == 4) ? "lunas" : null,

            'is_pengecualian' => $isPengecualian,

            'jenis_pengirim' => $request->jenisPengirim?? 'umum',
            'jenis_pengiriman' => "bus",
            'id_status_pembayaran' => $request->statusPembayaran,
            'jenis_paket' => $request->jenisPaket,
            'jenis_biaya' => $request->jenisBiaya,
            'asal' => $request->user->is_user_superadmin == 1 ? $request->pickup : $request->user->wilayah()->wilayah,
            'tujuan' => $request->dropoff,

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
    
    protected function validator(Request $request)
    {
        return $request->validate([
            'namaPengirim' => ['required', 'string', 'max:255'], 
            'nomorPengirim' => ['required', 'numeric', 'min:1'], 

            'namaPenerima' => ['required', 'string', 'max:255'], 
            'nomorPenerima' => ['required', 'numeric', 'min:1'],   

            'jenisPengiriman' => ['required', 'string'],  
            
            'pickup' => ['required', 'string'],  
            'dropoff' => ['required', 'string'],  

            'jenisBarang' => ['required', 'string'],  
            'jumlahBarang' => ['required', 'numeric', 'min:1'],  
            'namaBarang' => ['max:255'],   

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

    public function storeBusResi(Request $request){   
        $data = array();
        
        try {
            $detail = CargoPengirimanDetail::where('no_lmt', decrypt($request->no_lmt))->first();
        } catch (\Throwable $th) {
            return abort(404);  
        }
        $data = $detail->barangs($request->no_lmt);
        $detail->summary($request->no_lmt);

        $detail->created = date_format(date_create($detail->created_at->toDateString(), timezone_open("Asia/Jakarta")), 'd F Y'); 

        if(count($data) != 0 && $detail->no_lmt){  
            $pdf = PDF::loadView(CargoPengirimanBusController::$path .'CetakResi', [
                "data" => $data, 
                "detail" => $detail,
                "user" => $request->user
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
        // return $pdf->download("tes.pdf");
    }

    public function storeBusBarang(Request $request){   
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

    protected function barang()
    {
        $barang = PengirimanBus::all();
        $categorys = GoodsCategory::all(); 
        return view('page.admin.Bus.CargoBarangBus',compact('barang', 'categorys'));
    }

    protected function index()
    {
        $categorys = GoodsCategory::all(); 
        return view('page.admin.Bus.KategoriBarang.index',compact('categorys'))
            ->with('categorys', $categorys);
    } 

    protected function categorygoods(Request $request)
    {
        $categorys = new GoodsCategory;

        $categorys->category = $request->input('category');
        $categorys->name = $request->input('name');
        $categorys->pickup = $request->input('pickup');
        $categorys->dropoff = $request->input('dropoff');
        $categorys->price = $request->input('price');
        $categorys->save();
        return redirect('/barang/bus/category')->with('status','Data Telah Tersimpan');
    }
}
