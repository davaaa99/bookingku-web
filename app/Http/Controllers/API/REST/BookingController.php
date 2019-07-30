<?php

namespace App\Http\Controllers\API\REST;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;
use App\Booking;
use App\Field;
use App\Schedule;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $dataBooking = Booking::all();
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Unuccesfully retrieved data.' . $e->getMessage(),
                'serve' => []
            ], 408);
        }
        return response()->json([
            'message' => 'Succesfully retrieved data.',
            'serve' => $dataBooking
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id_schedule)
    {
        try {
            $client=Auth::user();

            $booking = new Booking();
            $booking->id_booking = Uuid::uuid1()->getHex();
            $booking->id_schedule = $id_schedule;
            $booking->client_email = $client->email;
            $booking->user_email = $request->user_email;
            $booking->payment_type = $request->payment_type;
            $booking->payment_status = $request->payment_status;
            $booking->created_by = $client->email;
            $booking->updated_by =$client->email;
            $booking->save();
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Unuccesfully insert data.' . $e->getMessage(),
                'serve' => []
            ], 408);
        }
        return response()->json([
            'message' => 'Succesfully insert data.',
            'serve' => $booking
        ], 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  String $email
     * @return \Illuminate\Http\Response
     */
    public function showByEmail()
    {
        try {
            $client=Auth::user();
            $listBooking = Booking::where('client_email',$client->email)->get();
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Unuccesfully retrieved data.' . $e->getMessage(),
                'serve' => []
            ], 408);
        }
        return response()->json([
            'message' => 'Succesfully retrieved data.',
            'serve' => $listBooking
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  String $email
     * @return \Illuminate\Http\Response
     */
    public function showByDate($id_location)
    {
        try {
            // $client=Auth::user();
            $datafield = Field::where('id_location', $id_location)->get();
            foreach ($datafield as $df) {
                $dataschedule = Schedule::where('id_field', $df->id_field)->get();
                foreach ($dataschedule as $df) {
                    $databooking[] = Booking::where('id_schedule', $df->id_schedule)->get();
                }
            }
            } catch (Exception $e) {
            return response()->json([
                'message' => 'Unuccesfully retrieved data.' . $e->getMessage(),
                'serve' => []
            ], 408);
        }
        return response()->json([
            'message' => 'Succesfully retrieved data.',
            'serve' => $databooking
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $client=Auth::user();
            $booking = Booking::find($id);
            $booking->payment_status=$request->payment_status;
            $booking->updated_by = $client->email;
            $booking->save();
        } catch (Exception $e){
            return response()->json([
                'message' => 'Unuccesfully update data.' . $e->getMessage(),
                'serve' => []
            ], 408);
        }
        return response()->json([
            'message' => 'Succesfully update data.',
            'serve' => $booking
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Booking::where('id_booking',$id)->delete();
        } catch (Exception $e){
            return response()->json([
                'message' => 'Unuccesfully delete data.' . $e->getMessage(),
                'serve' => []
            ], 408);
        }
        return response()->json([
            'message' => 'Succesfully detele data.',
            'serve' => []
        ], 200);
    }
}
