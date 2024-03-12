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

     public function __invoke(Request $request)
     {
         // Your logic for both GET and POST requests goes here
         // You can access input values using $request->input('inputName')
 
         // For example, getting the search query
         $searchQuery = $request->input('inputText');
 
         // Now you can use $searchQuery in your logic
 
         return view('searchbook', ['searchQuery' => $searchQuery]);
     }
    public function index()
    {
        // dd('Controller accessed', 'Data passed to the view');
        return view('searchbook');
    }
}
