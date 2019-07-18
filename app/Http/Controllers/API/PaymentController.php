<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;

class PaymentController extends Controller
{
    public function reportPayment($client_email){
        //membuat 
        //getData Booking berdasarkan client
        $payment=DB::table('booking')->where('client_email', $client_email)->where('created_at',$date)->get();
        $user=DB::table('users')->where('client_email', $client_email)->first('name');
        //generate pdf
        $pdf = PDF::loadview('invoice',['payment'=>$payment]);
        return $pdf->download('Invoice '.$user.' '.date('Y-m-d_H-i-s').'.pdf');
    }
}
