<?php

namespace App\Http\Controllers;

use App\Rating;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function review(Request $request){
        $review = new Review();
        $review->customer_id = Auth::user()->id;
        $review->property_id = $request->property_id;
        $review->description = $request->description;
        $review->save();

        $rating = new Rating();
        $rating->customer_id = Auth::user()->id;
        $rating->property_id = $request->property_id;
        $rating->number = $request->number;
        $rating->save();
        return redirect()->back();
    }
}
