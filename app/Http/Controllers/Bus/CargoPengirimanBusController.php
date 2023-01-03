<?php

namespace App\Http\Controllers\Bus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cargo\Bus\GoodsCategory;
use App\Models\Cargo\Bus\PengirimanBus;
use App\Models\Cargo\CargoPengirimanBarang;
use App\Models\Cargo\Bus\Wilayah;

class CargoPengirimanBusController extends Controller
{
    /**
     * Display a page pengiriman
     *
     * @return \Illuminate\Http\Response
     */
    protected function pagecreate(Request $request)
    {
        $pengiriman = new CargoPengirimanBarang(); 
        $pengiriman->nama_pengirim = $request->input('namaPengirim');
        $pengiriman->nomor_pengirim = $request->input('nomorPengirim');
        $pengiriman->nama_penerima = $request->input('namaPenerima');
        $pengiriman->nomor_penerima = $request->input('nomorPenerima');
        // $pengiriman->asal = $request->input('pickup');
        $pengiriman->tujuan = $request->input('dropoff');
        $pengiriman->jenis_barang = $request->input('jenisBarang');
        $pengiriman->nama_barang = $request->input('namaBarang');
        $pengiriman->berat = $request->input('beratBarang');
        $pengiriman->jumlah_barang = $request->input('jumlahBarang');
        $pengiriman->panjang = $request->input('panjangBarang');
        $pengiriman->lebar = $request->input('lebarBarang');
        $pengiriman->tinggi = $request->input('tinggiBarang');
        $pengiriman->biaya = $request->input('biayaBarang');
        $pengiriman->save();
        return redirect('/barang/bus/insert')->with('status','Data Telah Tersimpan'); 
    }
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

    protected function page(Request $request)
    {
        $cargoArray = $request->user->pengirimanBarangs();
        $wilayahArray = $request->user->allWilayah();
        $data = array(
            'name' => $request->user->name,
            'allCargo' => $cargoArray,
            'allWilayah' => $wilayahArray
        );
        return view('page.admin.Bus.CargoPengirimanBus', [], $data); 
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

   

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
}
