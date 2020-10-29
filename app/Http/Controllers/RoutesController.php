<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoutesController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request){
        //$rutas =
        return view('routes.index');
    }
}
