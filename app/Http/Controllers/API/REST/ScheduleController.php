<?php

namespace App\Http\Controllers\API\REST;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Auth;
use Mockery\CountValidator\Exception;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_field)
    {
        try{
            $schedules = schedules::where('id_field', $id_field)->get();
            
        }catch (Exception $e){
            return response()->json([
                'message' => 'Unuccesfully retrieved data.'. $e->getMessage(),
                'serve' => []
            ], 408);
        }
        return response()->json([
            'message' => 'Succesfully retrieved data.',
            'serve' => $schedules
        ], 200);  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id_field)
    {
        try{
            $schedule = new Schedules();
            $schedule->id_schedule = Uuid::uuid1()->getHex();
            $schedule->id_field = $id_field;
            $schedule->date = $request->date;
            $schedule->day = $request->day;
            $schedule->start_time = $request->start_time;
            $schedule->end_time = $request->end_time;
            $schedule->price = $request->price;
            $schedule->down_payment = $request->down_payment;
            // $schedule->booking_status =0;
            $schedule->booking_status= $request->booking_status;
            $schedule->created_at = $request->createat;
            $schedule->created_by = $request->createby;
            $schedule->save();
        }catch (Exception $e){
            return response()->json([
                'message' => 'failed insert data.'. $e->getMessage(),
                'serve' => []
            ],408);
        }
        return response()->json([
            'message' => 'Succesfully insert data.',
            'serve' => $schedule
        ], 201); 
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
