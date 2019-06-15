<?php

namespace App\Http\Controllers;

use App\Sport;

class SportController extends Controller
{
    public function view(){
        $sports = Price::where('property_id', Auth::user()->property->id)->get();
        return view('owner.sport.manage', ['sports' => $sports]);
    }
}
