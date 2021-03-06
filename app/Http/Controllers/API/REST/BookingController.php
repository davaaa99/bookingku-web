<?php

namespace App\Http\Controllers\API\REST;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;
use App\Booking;
use App\Field;
use App\Schedule;
use App\Location;
use Illuminate\Support\Carbon;

class BookingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct(Request $request)
    // {
    //     $this->middleware(['auth:api']);
    // }

    /**
     * Display a listing of the booking.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $dataBooking = Booking::select('users.name as user_name', 'bookings.id_booking', 'schedules.start_time', 'schedules.end_time', 'bookings.client_email', 'bookings.payment_status', 'bookings.payment_type')
                                    ->join('users','users.email','=','bookings.user_email')
                                    ->join('schedules','schedules.id_schedule','=','bookings.id_schedule')
                                    ->get();
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Failed retrieved data.' . $e->getMessage(),
                'serve' => []
            ], 500);
        }
        return response()->json([
            'message' => 'Succesfully retrieved data.',
            'serve' => $dataBooking
        ], 200);
    }

    /**
     * Create and store a new booking from user (mobile).
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {
            $user=Auth::user();
            /**
             * Store new booking
             */
            $booking = new Booking();
            $booking->id_booking = Uuid::uuid1()->getHex();
            $booking->id_schedule = $request->id_schedule;
            $booking->client_email = $request->client_email;
            $booking->user_email = $user->email;
            $booking->payment_type = $request->payment_type;
            $booking->payment_status = 0;
            $booking->created_by = $user->email;
            $booking->updated_by =$user->email;
            $booking->save();
            /**
             * Update booking_status in table schedule
             */
            $schedule = Schedule::find($request->id_schedule);
            $schedule->booking_status = 1;
            $schedule->save();
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Failed insert data.' . $e->getMessage(),
                'serve' => []
            ], 500);
        }
        return response()->json([
            'message' => 'Succesfully insert data.',
            'serve' => $booking
        ], 201);
    }

    /**
     * Create and store a new manual booking.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createBookingManual(Request $request)
    {
        try {
            $client=Auth::user();
            /**
             * Store new booking
             */
            $booking = new Booking();
            $booking->id_booking = Uuid::uuid1()->getHex();
            $booking->id_schedule = $request->id_schedule;
            $booking->client_email = $client->email;
            $booking->user_email = $request->user_email;
            $booking->payment_type = $request->payment_type;
            $booking->payment_status = 0;
            $booking->created_by = $client->email;
            $booking->updated_by =$client->email;
            $booking->save();
            /**
             * Update booking_status in table schedule
             */
            $schedule = Schedule::find($request->id_schedule);
            $schedule->booking_status = 1;
            $schedule->save();

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Failed insert data.' . $e->getMessage(),
                'serve' => []
            ], 500);
        }
        return response()->json([
            'message' => 'Succesfully insert data.',
            'serve' => $booking
        ], 201);
    }

    /**
     * Display the specified booking based on field and date.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function showByField(Request $request)
    {
        $date= new Carbon($request->date, 'Asia/Jakarta');
        $find= $date->format('Y-m-d');
        try {
            $listBooking=Field::join('schedules','schedules.id_field','=','fields.id_field')
                                    ->join('bookings','bookings.id_schedule','=','schedules.id_schedule')
                                    ->join('users','users.email','=','bookings.user_email')
                                    ->where('fields.id_field',$request->id_field)
                                    ->where('bookings.created_at','LIKE',"%$find%")
                                    ->select('users.name as user_name', 'bookings.id_booking', 'schedules.start_time', 'schedules.end_time', 'bookings.client_email', 'bookings.payment_status', 'bookings.payment_type')->get();
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Failed retrieved data.' . $e->getMessage(),
                'serve' => []
            ], 500);
        }
        return response()->json([
            'message' => 'Succesfully retrieved dakkkta.',
            'serve' => $listBooking
        ], 200);
    }

    /**
     * Display the specified booking based on location and date.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function showByLocation($id_location)
    {
        try {
            $listbooking=Location::join('fields','fields.id_location','=','locations.id_location')
                                    ->join('schedules','schedules.id_field','=','fields.id_field')
                                    ->join('bookings','bookings.id_schedule','=','schedules.id_schedule')
                                    ->join('users','users.email','=','bookings.user_email')
                                    ->where('locations.id_location',$id_location)
                                    ->select('users.name as user_name', 'bookings.id_booking', 'schedules.start_time', 'schedules.end_time', 'bookings.client_email', 'bookings.payment_status', 'bookings.payment_type')
                                    ->get();
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Failed retrieved data.' . $e->getMessage(),
                'serve' => []
            ], 500);
        }
        return response()->json([
            'message' => 'Succesfully retrieved data.',
            'serve' => $listbooking
        ], 200);
    }

    /**
     * Display the specified booking based on client.
     *
     * @return \Illuminate\Http\Response
     */
    public function showByClient()
    {
        try {
            $user = Auth::user();
            $listBooking = Booking::select('users.name as user_name', 'bookings.id_booking', 'schedules.start_time', 'schedules.end_time', 'bookings.client_email', 'bookings.payment_status', 'bookings.payment_type')
                                    ->join('users','users.email','=','bookings.user_email')
                                    ->join('schedules','schedules.id_schedule','=','bookings.id_schedule')
                                    ->where('client_email',$user->email)->get();
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Failed retrieved data.' . $e->getMessage(),
                'serve' => []
            ], 500);
        }
        return response()->json([
            'message' => 'Succesfully retrieved data.',
            'serve' => $listBooking
        ], 200);
    }

    /**
     * Display the specified booking based on user.
     *
     * @return \Illuminate\Http\Response
     */
    public function showByUser()
    {
        try {
            $user = Auth::user();
            $listBooking = Booking::where('user_email',$user->email)->get();
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Failed retrieved data.' . $e->getMessage(),
                'serve' => []
            ], 500);
        }
        return response()->json([
            'message' => 'Succesfully retrieved data.',
            'serve' => $listBooking
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified booking in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  String $id_booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_booking)
    {
        try {
            // $dataUser = Auth::user();
            $booking = Booking::find($id_booking);
            $booking->payment_status=$request->payment_status;
            // $booking->updated_by = $dataUser->email;
            $booking->save();
        } catch (Exception $e){
            return response()->json([
                'message' => 'Failed update data.' . $e->getMessage(),
                'serve' => []
            ], 500);
        }
        return response()->json([
            'message' => 'Succesfully update data.',
            'serve' => $booking
        ], 200);
    }

    /**
     * Remove the specified booking from storage.
     *
     * @param  String $id_booking
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_booking)
    {
        try {
            $client = Auth::user();
            $booking = Booking::find($id_booking);
            $booking->updated_by = $client->email;
            Booking::where('id_booking',$id_booking)->delete();
        } catch (Exception $e){
            return response()->json([
                'message' => 'Failed delete data.' . $e->getMessage(),
                'serve' => []
            ], 500);
        }
        return response()->json([
            'message' => 'Succesfully detele data.',
            'serve' => []
        ], 200);
    }
}
