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
            'name' => $request->user->name 
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
        return view('page.guest.tracking', [], [$data]);
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
                DATE(truck_trackings.created_at) as created',
            ) 
            ->leftJoin("truck_trackings", "truck_trackings.no_lmt", "cargo_pengiriman_details.no_lmt") 
            ->leftJoin("message_trackings", "message_trackings.id_message_tracking", "truck_trackings.id_message_tracking") 
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
