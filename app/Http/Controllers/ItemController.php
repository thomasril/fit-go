<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function view($id){
        $items = Item::where('sport_id', $id)->get();
        return view('owner.item.manage', ['items' => $items]);
    }

    public function insert(Request $request)
    {
        $item = new Item();
        $item->sport_id = $request->sport_id;
        $item->name = $request->name;
        $item->price = $request->price;
        $item->save();
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $item = Item::find($request->id);
        $item->sport_id = $request->sport_id;
        $item->name = $request->name;
        $item->price = $request->price;
        $item->save();
        return redirect()->back();
    }

    public function delete($id)
    {
        $item = Item::find($id);
        $item->delete();
        return redirect()->back();
    }
}
