<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;
use App\Mail\InvoiceMail;
use Illuminate\Support\Facades\Mail;
use App\bookings;
use App\payments;
use App\payment_booking;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function reportPayment($client_email,$date){
        //getData Booking berdasarkan client
        $booking=bookings::where('client_email', $client_email)->where('created_at','LIKE',"%$date%")->get();
        // $user=DB::table('users')->where('client_email', $client_email)->first('name');
        // //generate pdf
        // $pdf = PDF::loadview('invoice',['booking'=>$booking]);
        // $invoice = $pdf->download('Invoice '.$user.' '.date('Y-m-d_H-i-s').'.pdf');
        // //send invoice
        // $objInvoice = new \stdClass();
        // $objInvoice->sender = 'example@mail.com';   //ganti pake email admin
        // $objInvoice->reciever = $client_email;

        // Mail::to($client_email)->send(new InvoiceMail($objInvoice));
        // add to db payment
        $payment = new payments();
        $payment->id_payment = (String) Str::uuid();
        $payment->report_status = 0;
        $payment->save();
        // add to db payment_booking
        foreach($booking as $booklist ){
            $payment_booking = new payment_booking();
            $payment_booking->id_payment = $payment->id_payment;
            $payment_booking->id_booking = $booklist->id_booking;
            $payment_booking->save();
        }
        return 'success';
    }
    public function updatePayment(request $request, $id_payment){
        $payment = payments::where('id_payment',$id_payment)->update([
            'report_status' => 1
        ]);
        return 'Update report berhasil';
    }
    //softdelete
    public function deletePayment($id_payment){
        payments::where('id_payment',$id_payment)->delete();

        return 'delete berhasil';
    }

}
