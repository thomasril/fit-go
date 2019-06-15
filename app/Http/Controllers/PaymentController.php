<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function insert(Request $request)
    {
        $payment = new Payment();
        $payment->property_id = $request->property_id;
        $payment->bank_id = $request->bank_id == null ? 1 : $request->bank_id;
        $payment->account_name = $request->account_name;
        $payment->account_number = $request->account_number;
        $payment->method = $request->pay_method;
        $payment->save();
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $payment = Payment::find($request->id);
        $payment->bank_id = $request->bank_id == null ? 1 : $request->bank_id;
        $payment->account_name = $request->account_name;
        $payment->account_number = $request->account_number;
        $payment->method = $request->pay_method;
        $payment->save();
        return redirect()->back();
    }

    public function delete($id)
    {
        $payment = Payment::find($id);
        $payment->delete();
        return redirect()->back();
    }
}
