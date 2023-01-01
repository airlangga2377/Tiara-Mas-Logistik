<?php

namespace App\Http\Controllers\Bus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cargo\Bus\GoodsCategory;
use App\Models\Cargo\Bus\PengirimanBus;
use Dotenv\Regex\Success;

class CargoPengirimanBusController extends Controller
{
    /**
     * Display a page pengiriman
     *
     * @return \Illuminate\Http\Response
     */
    protected function pagecreate(Request $request)
    {
        $pengiriman = new PengirimanBus(); 
        $pengiriman->nama_pengirim = $request->input('namaPengirim');
        $pengiriman->telepon_pengirim = $request->input('nomorPengirim');
        $pengiriman->nama_penerima = $request->input('namaPenerima');
        $pengiriman->telepon_penerima = $request->input('nomorPenerima');
        $pengiriman->asal_barang = $request->input('pickup');
        $pengiriman->tujuan_barang = $request->input('dropoff');
        $pengiriman->jenis_barang = $request->input('jenisBarang');
        $pengiriman->nama_barang = $request->input('namaBarang');
        $pengiriman->berat_barang = $request->input('beratBarang');
        $pengiriman->jumlah_barang = $request->input('jumlahBarang');
        $pengiriman->panjang_barang = $request->input('panjangBarang');
        $pengiriman->lebar_barang = $request->input('lebarBarang');
        $pengiriman->tinggi_barang = $request->input('tinggiBarang');
        $pengiriman->harga_barang = $request->input('biayaBarang');
        $pengiriman->save();
        return redirect('/barang/bus/insert')->with('status','Data Telah Tersimpan'); 
    }

    protected function page()
    {
        $pengiriman = PengirimanBus::all();
        $categorys = GoodsCategory::all(); 
        return view('page.admin.Bus.CargoPengirimanBus',compact('pengiriman', 'categorys'));
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
