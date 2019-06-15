<?php

namespace App\Http\Controllers;

use App\MasterSport;
use Illuminate\Http\Request;

class MasterSportController extends Controller
{
    public function view()
    {
        $sport = MasterSport::all();
        return view('admin.sport.manage', ['sports' => $sport]);
    }

    public function insert(Request $request)
    {
        $sport = new MasterSport();
        $sport->name = $request->name;
        $sport->bookable = $request->bookable;
        $sport->save();
        return redirect('/admin/sport/manage');
    }

    public function update(Request $request)
    {
        $sport = MasterSport::find($request->id);
        $sport->name = $request->name;
        $sport->bookable = $request->bookable;
        $sport->save();
        return redirect('/admin/sport/manage');
    }

    public function delete($id)
    {
        $sport = MasterSport::find($id);
        $sport->delete();
        return redirect('/admin/sport/manage');
    }
}
