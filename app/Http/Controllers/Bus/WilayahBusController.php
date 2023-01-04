<?php

namespace App\Http\Controllers\Bus;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Regencies;
use App\Models\Cargo\Bus\Wilayah;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class WilayahBusController extends Controller
{
    protected function page(Request $request)
    {
        $wilayahArray = $request->user->allWilayah();
        $kotaArray = $request->user->allRegencies();
        $data = array(
            'name' => $request->user->name,
            'allWilayah' => $wilayahArray,
            'allKota' => $kotaArray,
        );
        return view('page.admin.Bus.Wilayah.index', [], $data);        

    } 

    public function add_wilayah(Request $request)
    {
        $q = DB::table('area_bus')->select(DB::raw('MAX(RIGHT(kode_wilayah,3))as kode'));
        $kd="";
        if($q->count()>0)
        { 
            foreach($q->get() as $k)
            {
                $tmp = ((int)$k->kode)+1;
                $kd = sprintf("00" .$tmp);
            }
        }else
        {
            $kd = "001";
        }
        $wilayah = new Wilayah();        
        $wilayah->kota = $request->input('city');
        $wilayah->name = $request->input('name');
        $wilayah->alamat = $request->input('alamat');
        $wilayah->kode_wilayah = $kd;
        $wilayah->save();
        return redirect('/barang/bus/wilayah')->with('status','Data Telah Tersimpan');
        // dd($kd);

    }
}
