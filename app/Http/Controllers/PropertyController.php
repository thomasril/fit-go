<?php

namespace App\Http\Controllers;

use App\Facility;
use App\Field;
use App\Image;
use App\Price;
use App\Property;
use App\Sport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.property.manage');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        //
    }

    public function managePage() {
        return view('owner.property.manage');
    }

    public function insertPropertyPage() {
        return view('owner.property.insert');
    }

    public function insertProperty(Request $request) {
//        dd($request->all());
//        $this->validate($request, [
//            'name' => 'required',
//            'description' => 'required',
//            'address' => 'required',
//            'open_hour' => 'required',
//            'close_hour' => 'required',
//            'latitude' => 'required',
//            'longitude' => 'required',
//            'image' => 'required',
//            'image.*' => 'image',
//            'sport' => 'required',
//        ]);
        $property = Property::create(array_merge($request->only(
            'name',
            'description',
            'address',
            'open_hour',
            'close_hour',
            'latitude',
            'longitude'
        ), [
            'owner_id' => Auth::user()->id,
            'status' => 'pending'
        ]));
        $sports = $request->sport;
        $images = $request->file('image');
        for($i = 0; $i < count($images); $i++) {
            $image = $images[$i];
            $uid = Uuid::getFactory()->uuid4()->toString();
            $path = "image/property";
            $fileName = $uid . '.' . $image->getClientOriginalExtension();
            $image->move($path, $fileName);
            $img = new Image();
            $img->name = $path . "/" . $fileName;
            $img->property_id = $property->id;
            $img->save();
        }
        for($i = 0; $i < count($sports); $i++) {
            $sport = new Sport();
            $sport->property_id = $property->id;
            $sport->name = $sports[$i];
            $sport->save();
            $sportFormId = $request->sportid[$i];
            $prices = $request->price[$sportFormId];
            for($j = 0; $j < count($prices); $j++) {
                $price = new Price();
                $price->sport_id = $sport->id;
                $price->name = $request->unit[$sportFormId][$j];
                $price->number= $request->price[$sportFormId][$j];
                $price->save();
            }
            for($j = 0; $j < $request->field[$i]; $j++) {
                $field = new Field();
                $field->sport_id = $sport->id;
                $field->name = $j + 1;
                $field->save();
            }
        }
        $facilities = $request->facility;
        foreach($facilities as $facility) {
            $f = new Facility();
            $f->property_id = $property->id;
            $f->name = $facility;
            $f->save();
        }
        return redirect()->back();
    }
}
