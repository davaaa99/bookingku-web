<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\bookings;
class BookingController extends Controller
{
    //mengambil semua data booking yang pernah dilakukan
    public function getBooking(){
        return bookings::all();
    }
    // //input booking baik dari user maupun client
    // public function createBooking(request $request){

    // }
    //untuk mengambil data booking milih user
    //untuk mengambil data booking dan update manual oleh client
    public function getBookingByEmail($email){
        $listBooking = bookings::where('client_email',$email)->get();
        return $listBooking;
    }
    //untuk mengambil data booking berdasarkan lokasi dan tanggal untuk update status
    public function getBookingByDate($location, $date){

        $userID = locations::where('id_location',$location)->get('id_user');
        $email =  users::where('id_users',$userID)->get('email');
        $listBooking = bookings::where('client_email',$email)->where('created_at',$date)->get();
        return $listBooking;
    }
}