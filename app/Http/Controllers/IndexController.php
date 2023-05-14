<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\City;

class IndexController extends Controller
{
    public function index($slug = '') 
    {
        $areas = Area::with('cities')->get();


        return view('home', [
            'areas' => $areas,
        ]);
    }
}
