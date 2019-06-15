<?php

namespace App\Http\Controllers;

use App\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PriceController extends Controller
{
    public function view($id){
        $prices = Price::where('sport_id', $id)->get();
        return view('owner.price.manage', ['prices' => $prices]);
    }

    public function insert(Request $request)
    {
        $price = new Price();
        $price->sport_id = $request->sport_id;
        $price->name = $request->name;
        $price->number = $request->number;
        $price->save();
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $price = Price::find($request->id);
        $price->sport_id = $request->sport_id;
        $price->name = $request->name;
        $price->number = $request->number;
        $price->save();
        return redirect()->back();
    }

    public function delete($id)
    {
        $price = Price::find($id);
        $price->delete();
        return redirect()->back();
    }
}
