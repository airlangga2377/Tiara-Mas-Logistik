<?php

namespace App\Http\Controllers;

use App\Models\Cargo\CargoPengirimanDetail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a page home
     *
     * @return \Illuminate\Http\Response
     */
    protected function page(Request $request)
    { 
        $data = array(
            'name' => $request->user->name,
            'jenisUser' => $request->user->jenis_user,
        );

        return view('page.home', [], $data);
    }

    /**
     * Display a page home
     *
     * @return \Illuminate\Http\Response
     */
    protected function pageGuest(Request $request)
    {
        $data = array();
<<<<<<< HEAD
        if($request->r){
            try {
                $no_lmt = decrypt($request->r); 
                // $no_lmt = $request->r; 
        
                // Untuk membuat manifest
                $detail = CargoPengirimanDetail::
                selectRaw(
                    '
                    message_trackings.pesan,  
                    DATE(trackings.created_at) as created',
                ) 
                ->leftJoin("trackings", "trackings.no_lmt", "cargo_pengiriman_details.no_lmt") 
                ->leftJoin("message_trackings", "message_trackings.id_message_tracking", "trackings.id_message_tracking") 
                ->leftJoin("trucks", "trucks.no_pol", "cargo_pengiriman_details.no_pol") 
                ->where('cargo_pengiriman_details.no_lmt', $no_lmt)
                ->skip(0)->take(3)
                ->get();

                $data = array(        
                    'trackings' => $detail
                ); 
            } catch (\Throwable $th) {
                return abort(404);  
            } 
        } else{
            $data = array(        
                'trackings' => array()
            ); 
        }
        return view('page.guest.tracking', [], $data);
=======
        return view('page.guest.tracking', [], [$data]);
>>>>>>> a1d66252d031d8304a268ea3ce5a09ee09d6e01d
    }
    
    /**
     * Display a page home
     *
     * @return \Illuminate\Http\Response
     */
    protected function pageTrackingGuest(Request $request)
    { 
        try {
            $no_lmt = $request->r; 
    
            // Untuk membuat manifest
            $data = CargoPengirimanDetail::
            selectRaw(
                '
                message_trackings.pesan,  
<<<<<<< HEAD
                DATE(trackings.created_at) as created',
            ) 
            ->leftJoin("trackings", "trackings.no_lmt", "cargo_pengiriman_details.no_lmt") 
            ->leftJoin("message_trackings", "message_trackings.id_message_tracking", "trackings.id_message_tracking") 
=======
                DATE(truck_trackings.created_at) as created',
            ) 
            ->leftJoin("truck_trackings", "truck_trackings.no_lmt", "cargo_pengiriman_details.no_lmt") 
            ->leftJoin("message_trackings", "message_trackings.id_message_tracking", "truck_trackings.id_message_tracking") 
>>>>>>> a1d66252d031d8304a268ea3ce5a09ee09d6e01d
            ->leftJoin("trucks", "trucks.no_pol", "cargo_pengiriman_details.no_pol") 
            ->where('cargo_pengiriman_details.no_lmt', $no_lmt)
            ->skip(0)->take(3)
            ->get();
        } catch (\Throwable $th) {
            return abort(404);  
        } 
        return response($data);
    }
}
