<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;
use App\Mail\InvoiceMail;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function reportPayment($client_email){
        //membuat 
        //getData Booking berdasarkan client
        $payment=DB::table('booking')->where('client_email', $client_email)->where('created_at',$date)->get();
        $user=DB::table('users')->where('client_email', $client_email)->first('name');
        //generate pdf
        $pdf = PDF::loadview('invoice',['payment'=>$payment]);
        $invoice = $pdf->download('Invoice '.$user.' '.date('Y-m-d_H-i-s').'.pdf');
        //send invoice
        $objInvoice = new \stdClass();
        $objInvoice->sender = 'example@mail.com';   //ganti pake email admin
        $objInvoice->reciever = $client_email;

        Mail::to($client_email)->send(new InvoiceMail($objInvoice));
    }
}
