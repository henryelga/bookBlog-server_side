<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchBookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('Controller accessed', 'Data passed to the view');
        return view('searchbook');
    }
}
