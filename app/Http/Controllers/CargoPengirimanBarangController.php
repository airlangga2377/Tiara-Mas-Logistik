<?php

namespace App\Http\Controllers;

use App\Models\Cargo\CargoPengirimanBarang;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Console\Presets\React;
use Illuminate\Http\Request; 

class CargoPengirimanBarangController extends Controller
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
        return view('page.admin.CargoPengirimanBarang', [], $data);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function index(Request $request)
    {
        //
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
            'nomorPengirim' => ['required', 'numeric', 'min:1', 'max:13'], 

            'namaPenerima' => ['required', 'string', 'max:255'], 
            'nomorPenerima' => ['required', 'numeric', 'min:1', 'max:13'],  

            'jenisBarang' => ['required', 'string', 'min:1'],  
            'jumlahBarang' => ['required', 'numeric', 'min:1'],  
            'keterangan' => ['max:255'],  
            
            // 'pilihSupir' => ['required', 'string', 'max:255'],  
            // 'pilihKernet' => ['required', 'string', 'max:255'],   

            'biaya' => ['required', 'numeric', 'min:1'],  
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
            
            'jenisBarang.required' => "Jenis barang kosong",
            'jenisBarang.string' => "Jenis tidak boleh angka",

            'jumlahBarang.required' => "Jumlah barang kosong",

            'keterangan.max' => "Keterangan melebihi batas",

            'biaya.required' => "Biaya kosong",
            'biaya.numeric' => "Biaya penerima hanya boleh angka", 
            'biaya.min' => "Minimal biaya berisi 1 rupiah",
        ]
        );
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $no_resi = '';
        if($request->user->kota){ 
            $no_resi = $request->user->kota . time() . (string) rand(1, 9);
        }
        else {
            // $no_resi = $request->kota . time() . (string) rand(100, 999);
        }

        if($this->validator($request)){  
            CargoPengirimanBarang::create([ 
                'no_resi' => $no_resi,

                'nama_pengirim' => $request->namaPengirim,
                'nomor_pengirim' => $request->nomorPengirim,
                'nama_penerima' => $request->namaPenerima,
                'nomor_penerima' => $request->nomorPenerima,

                'jenis_barang' => $request->jenisBarang,
                'jumlah_barang' => $request->jumlahBarang,
                'keterangan' => $request->keterangan,

                'sopir' => $request->pilihSupir,
                'kernet' => $request->pilihKernet,

                'biaya' => $request->biaya,
                'is_lunas' => $request->isLunas,

                'id_user' => $request->user->id, 
            ]); 
            return redirect('barang/pengiriman')->with('message', 'Tambah Berhasil');
        }
        $data = array();
        $data['message'] = 'Terdapat yang salah';

        if ($request->namaPengirim) {
            $data['message'] = $request->namaPengirim;
        }
        

        // return redirect('barang/pengiriman')->withErrors($data);
        return redirect()->back()->withErrors($data);
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
     * @param  \App\CargoPengirimanBarang  $cargoPengirimanBarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CargoPengirimanBarang $cargo_pengiriman_barang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cargo_pengiriman_barang  $cargoPengirimanBarang
     * @return \Illuminate\Http\Response
     */
    public function destroy(CargoPengirimanBarang $cargoPengirimanBarang)
    {
        //
    }
}
