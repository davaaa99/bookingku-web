<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\bookings;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookingController extends Controller
{
    //mengambil semua data booking yang pernah dilakukan
    public function getBooking(){
        // return bookings::all();
        return response()->json([
            'message' => 'Unable to save data. Bad config.',
            'serve' => bookings::all()
        ], 200);
    }
    // //input booking baik dari user maupun client
    public function createBooking(request $request){
        $booking = new bookings();
        $booking->id_booking = (String) Str::uuid();
        $booking->id_schedule = $request->id_schedule;
        $booking->client_email = $request->client_email;
        $booking->user_email = $request->user_email;
        $booking->payment_type = $request->payment_type;
        $booking->payment_status = $request->payment_status;
        $booking->created_by = $request->created_by;
        
        $booking->save();
        return 'booking telah tercatat';
    }
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
    //edit status payment
    public function updateStatusPayment(request $request,$id_booking){ 
        $booking = bookings::where('id_booking',$id_booking)->update([
            'payment_status' => $request->payment_status
        ]);
        return 'update status berhasil';
        // return $booking;
    }
    //softdelete
    public function deleteBooking($id_booking){
        bookings::where('id_booking',$id_booking)->delete();

        return 'delete berhasil';
    }
}