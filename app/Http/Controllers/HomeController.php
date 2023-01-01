<?php

namespace App\Http\Controllers;

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
}
