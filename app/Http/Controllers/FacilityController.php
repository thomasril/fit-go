<?php

namespace App\Http\Controllers;

use App\Facility;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    public function view($id){
        $facilities = Facility::where('sport_id', $id)->get();
        return view('owner.price.manage', ['facilities' => $facilities]);
    }

    public function insert(Request $request)
    {
        $facility = new Facility();
        $facility->property_id = $request->property_id;
        $facility->name = $request->name;
        $facility->save();
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $facility = Facility::find($request->id);
        $facility->property_id = $request->property_id;
        $facility->name = $request->name;
        $facility->save();
        return redirect()->back();
    }

    public function delete($id)
    {
        $facility = Facility::find($id);
        $facility->delete();
        return redirect()->back();
    }
}
