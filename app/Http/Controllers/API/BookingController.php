<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Ramsey\Uuid\Uuid;
use App\bookings;
class BookingController extends Controller
{
    public function getBooking(){
        return bookings::all();
        // return DB::table('bookings')->get();
    }
    public function createBooking(request $request){
        $data = $required->all();
        $bookings = new bookings();
        
        $bookings->id_booking = $required->id_booking;
        $bookings->id_schedule = $required->id_schedule;
        $bookings->client_email = $required->client_email;
        $bookings->user_email = $required->user_email;
        $bookings->payment_type = $required->payment_type;
        $bookings->report_status = $required->report_status;
        $bookings->created_by = $required->created_by;
        $bookings = bookings::create($data);
    }
}