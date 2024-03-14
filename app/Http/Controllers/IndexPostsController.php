<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IndexPost; 
use Cviebrock\EloquentSluggable\Services\SlugService;

class IndexPostsController extends Controller
{
 
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index')
            ->with('posts', IndexPost::orderBy('updated_at', 'DESC')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
}
