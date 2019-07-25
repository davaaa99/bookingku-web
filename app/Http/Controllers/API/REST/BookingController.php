<?php

namespace App\Http\Controllers\API\REST;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
            $dataBooking = bookings::all();
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Unuccesfully retrieved data.',
                'serve' => report($e)
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  String $email
     * @return \Illuminate\Http\Response
     */
    public function showByEmail($email)
    {
        try {
            $listBooking = bookings::where('client_email',$email)->get();
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Unuccesfully retrieved data.',
                'serve' => report($e)
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
     * @param  String $location
     * @param  Date $date
     * @param  String $email
     * @return \Illuminate\Http\Response
     */

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
