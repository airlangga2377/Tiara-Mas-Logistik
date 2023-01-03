<?php

namespace App\Http\Controllers\Bus;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Regency;
use App\Models\Cargo\Bus\Wilayah;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class WilayahBusController extends Controller
{
    protected function index(Request $request)
    {
        $regencyArray = $request->user->allKota();
        $wilayahArray = $request->user->allWilayah();
        $q = DB::table('area_bus')->select(DB::raw('MAX(RIGHT(kode_wilayah,3))as kode'));
        $kd="";
        if($q->count()>0)
        { 
            foreach($q->get() as $k)
            {
                $tmp = ((int)$k->kode)+1;
                $kd = sprintf("$03s", $tmp);
            }
        }else
        {
            $kd = "001";
        }
        $data = array(
            'name' => $request->user->name,
            'allWilayah' => $wilayahArray,
            'allKota' => $regencyArray,
            'kd' => $kd
        );
        return view('page.admin.Bus.Wilayah.index', [], $data);
        

    } 

    public function add_wilayah(Request $request)
    {
        $wilayah = new Wilayah();        
        $wilayah->kota = $request->input('city');
        $wilayah->alamat = $request->input('alamat');
        $wilayah->kode_wilayah = $request->input('kode_wilayah');
        $wilayah->save();
        return redirect('/barang/bus/wilayah')->with('status','Data Telah Tersimpan');
    }
}
