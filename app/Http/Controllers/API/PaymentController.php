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

        $payment = new payments();
        $payment->id_payment = (String) Str::uuid();
        $payment->report_status = 1;
        $payment->save();
    }
    public function updatePayment(request $request, $id_payment){
        $payment = payments::where('id_payment',$id_payment)->update([
            'report_status' => 2
        ]);
        return 'Update report berhasil';
    }
    //softdelete
    public function deletePayment($id_payment){
        bookings::where('id_payment',$id_payment)->delete();

        return 'delete berhasil';
    }

}
