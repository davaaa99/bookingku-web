<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\bookings;
use App\locations;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;
use PHPUnit\Framework\MockObject\Stub\Exception;

class BookingController extends Controller
{
    //mengambil semua data booking yang pernah dilakukan
    public function getBooking(){
        try {
            $dataBooking = bookings::all();
            return response()->json([
                'message' => 'Succesfully retrieved data.',
                'serve' => $dataBooking
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Unuccesfully retrieved data.',
                'serve' => report($e)
            ], 408);
        }

        // $dataBooking = bookings::all();
        // return response()->json([
        //     'message' => 'Succesfully retrieved data.',
        //     'serve' => $dataBooking
        // ], 200);
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
        try {
            $booking->save();
            return response()->json([
                'message' => 'Succesfully insert data.',
                'serve' => $booking
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Unuccesfully insert data.',
                'serve' => report($e)
            ], 408);
        }
        // $booking->save();
        // return 'booking telah tercatat';
    }
    //untuk mengambil data booking milih user
    //untuk mengambil data booking dan update manual oleh client
    public function getBookingByEmail($email){
        try {
            $listBooking = bookings::where('client_email',$email)->get();
            return response()->json([
                'message' => 'Succesfully retrieved data.',
                'serve' => $listBooking
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Unuccesfully retrieved data.',
                'serve' => report($e)
            ], 408);
        }
        // $listBooking = bookings::where('client_email',$email)->get();
        // return $listBooking;
    }
    //untuk mengambil data booking berdasarkan lokasi dan tanggal untuk update status
    public function getBookingByDate($location, $date,$email){
        // public function getBookingByDate($userID){
        try {
            $userID = locations::where('id_location',$location)->first();
            // $email =  users::where('id_users',$userID)->get('email');
            $listBooking = bookings::where('client_email',$email)->where('created_at',$date)->get();
            return response()->json([
                'message' => 'Succesfully retrieved data.',
                'serve' => $listBooking
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Unuccesfully retrieved data.',
                'serve' => report($e)
            ], 408);
        }
        // $userID = locations::where('id_location',$location)->get('id_user');
        // $email =  users::where('id_users',$userID)->get('email');
        // $listBooking = bookings::where('client_email',$email)->where('created_at',$date)->get();
        // return $listBooking;
    }
    //edit status payment
    public function updateStatusPayment(request $request,$id_booking){
        try {
            $booking = bookings::where('id_booking',$id_booking)->update([
                'payment_status' => $request->payment_status
            ]);
            return response()->json([
                'message' => 'Succesfully update data.',
                'serve' => $booking
            ], 200);
        } catch (Exception $e){
            return response()->json([
                'message' => 'Unuccesfully update data.',
                'serve' => report($e)
            ], 408);
        } 
        // $booking = bookings::where('id_booking',$id_booking)->update([
        //     'payment_status' => $request->payment_status
        // ]);
        // return 'update status berhasil';
        // // return $booking;
    }
    //softdelete
    public function deleteBooking($id_booking){
        try {
            bookings::where('id_booking',$id_booking)->delete();
            return response()->json([
                'message' => 'Succesfully detele data.'
                // 'serve' => $booking
            ], 200);
        } catch (Exception $e){
            return response()->json([
                'message' => 'Unuccesfully delete data.',
                'serve' => report($e)
            ], 408);
        } 
        // bookings::where('id_booking',$id_booking)->delete();

        // return 'delete berhasil';
    }
}