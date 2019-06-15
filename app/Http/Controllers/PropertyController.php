<?php

namespace App\Http\Controllers;

use App\Facility;
use App\Field;
use App\Image;
use App\MasterBank;
use App\Price;
use App\Property;
use App\Sport;
use App\Subscription;
use Carbon\Carbon;
use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class PropertyController extends Controller
{
    public function home() {
        $properties = Property::orderBy('created_at', 'desc')->limit(3)->get();
        return view('customer.home', ['properties' => $properties]);
    }


    public function index()
    {
        $properties = Property::all();

        return view('admin.property.manage', ['properties' => $properties]);
    }

    public function dashboard(){
        $property = Property::where('owner_id', Auth::user()->id)->first();
        $banks = MasterBank::all();
        return view('owner.dashboard', ['property' => $property, 'banks' => $banks]);
    }

    public function indexPage() {
        $property = Auth::user()->property;
        return view('public.component.schedule', compact('property'));
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
            $sport->master_sport_id = $sports[$i];
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

    public function updatePropertyPage($id) {
        $property = Property::find($id);
        return view('owner.property.update', ['property' => $property]);
    }

    public function updateProperty(Request $request){
        $property = Property::find($request->id);
        $property->name = $request->name;
        $property->description = $request->description;
        $property->latitude = $request->latitude;
        $property->longitude = $request->longitude;
        $property->address = $request->address;
        $property->open_hour = $request->open_hour;
        $property->close_hour = $request->close_hour;
        $property->save();

        $images = $request->file('image');
        if($images != null) {
            $property->images()->delete();
            for ($i = 0; $i < count($images); $i++) {
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
        }

        return redirect()->back();
    }

    public function approve($id){
        $property = Property::find($id);
        $property->status = 'Approved';
        $property->save();

        $now = date('Y-m-d');
        $subscription = new Subscription();
        $subscription->owner_id = $property->owner_id;
        $subscription->price = 0;
        $subscription->start_date = $now;
        $subscription->end_date = date('Y-m-d', strtotime('+1 month', strtotime($now)));
        $subscription->save();
        return redirect()->back();
    }

    public function reject($id){
        $property = Property::find($id);
        $property->status = 'Rejected';
        $property->save();
        return redirect()->back();
    }

    public function ban($id){
        $property = Property::find($id);
        $property->status = 'Banned';
        $property->save();
        return redirect()->back();
    }

    public function searchPage() {
        $search = '';
        $filters = [];
        $longitude = 106.80293103988141;
        $latitude = -6.244535956497469;

        if(request()->longitude)
            $longitude = request()->longitude;
        if(request()->latitide)
            $latitude = request()->latitude;

        if(request()->search) {
            $search = request()->search;
        }
        if(request()->filter) {
            $filters = request()->filter;
        }

        $properties = Property::where('name', 'like', "%$search%");
        if(count($filters) > 0 && request()->start) {
            $start = strtotime(request()->start);
            $end = strtotime(request()->end);
            $date = request()->date;
            $time = [];
            for($i = $start; $i < $end; $i+=3600) {
                $time[] = date('H:i:s', $i);
            }
            $properties = $properties->whereHas('sports', function($query) use ($filters, $time, $date) {
                $query->whereHas('masterSport', function($query) use($filters) {
                    $query->whereIn('id', $filters);
                })->whereHas('fields', function($query) use($time, $date) {
                    foreach($time as $t) {
                        $query->whereDoesntHave('schedules', function($query) use($t, $date) {
                            $query->where('time', $t)->where('date', $date);
                        });
                    }
                });
            });
        }
        else if(count($filters) > 0) {
            $properties = $properties->whereHas('sports', function($query) use ($filters) {
                $query->whereHas('masterSport', function($query) use($filters) {
                    $query->whereIn('id', $filters);
                });
            });
        } else if(request()->start) {
            $start = strtotime(request()->start);
            $end = strtotime(request()->end);
            $date = request()->date;
            $time = [];
            for($i = $start; $i < $end; $i+=3600) {
                $time[] = date('H:i:s', $i);
            }
            $properties = $properties->whereHas('sports', function($query) use ($time, $date) {
                $query->whereHas('fields', function($query) use($time, $date) {
                    foreach($time as $t) {
                        $query->whereDoesntHave('schedules', function($query) use($t, $date) {
                            $query->where('time', $t)->where('date', $date);
                        });
                    }
                });
            });
        }

//        $properties = $properties->sortBy(function($property, $index) use($latitude, $longitude) {
//            return $this->distance($latitude, $longitude, $property->latitude, $property->longitude, 'K');
//        });

        $properties = $properties->get();
        if(request()->start) {
            $start = strtotime(request()->start);
            $end = strtotime(request()->end);
            $time = [];
            for($i = $start; $i < $end; $i+=3600) {
                $time[] = date('H:i:s', $i);
            }
            $temp = [];
        }
        foreach($properties as $property) {
            $property['distance'] = $this->distance($latitude, $longitude, $property->latitude, $property->longitude, 'K');
        }
        $properties = $properties->sortBy('distance');
        return view('customer.property.search', compact('properties'));
    }

    public function detailPage($id) {
        $property = Property::find($id);
        return view('customer.property.detail', compact('property'));
    }

    public function bookingPage($id) {
        $property = Property::find($id);
        return view('public.component.schedule', compact('property'));
    }
    function distance($lat1, $lon1, $lat2, $lon2, $unit) {
        if (($lat1 == $lat2) && ($lon1 == $lon2)) {
            return 0;
        }
        else {
            $theta = $lon1 - $lon2;
            $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
            $dist = acos($dist);
            $dist = rad2deg($dist);
            $miles = $dist * 60 * 1.1515;
            $unit = strtoupper($unit);

            if ($unit == "K") {
                return ($miles * 1.609344);
            } else if ($unit == "N") {
                return ($miles * 0.8684);
            } else {
                return $miles;
            }
        }
    }
}
