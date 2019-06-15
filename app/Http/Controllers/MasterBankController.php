<?php

namespace App\Http\Controllers;

use App\MasterBank;
use Illuminate\Http\Request;

class MasterBankController extends Controller
{
    public function view()
    {
        $banks = MasterBank::all();
        return view('admin.bank.manage', ['banks' => $banks]);
    }

    public function insert(Request $request)
    {
        $bank = new MasterBank();
        $bank->name = $request->name;
        $bank->save();
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $bank = MasterBank::find($request->id);
        $bank->name = $request->name;
        $bank->save();
        return redirect()->back();
    }

    public function delete($id)
    {
        $bank = MasterBank::find($id);
        $bank->delete();
        return redirect()->back();
    }
}
