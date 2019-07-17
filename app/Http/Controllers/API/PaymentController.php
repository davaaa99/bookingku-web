<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;

class PaymentController extends Controller
{
    // public function updateStatusPembayaran($id_booking,$status_pembayaran){
    //     //update data booking
    //     $payment=DB::table('booking')->where('idBooking',$id_booking)->update([
    //         'status_pembayaran'=>$status_pembayaran
    //     ]);
    // }

    // public function reportPayment($id_booking){
    //     //getData Booking berdasarkan client
    //     $payment=DB::table('booking')->where('emailClient', $id_booking)->get();
    //     //generate pdf
    //     $pdf = PDF::loadview('invoice',['payment'=>$payment]);
    //     //send email
    //     Mail::send('invoice',$pdf,)
    // }
}
