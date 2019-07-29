<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Ramsey\Uuid\Uuid;
use App\schedules;
use PHPUnit\Framework\MockObject\Stub\Exception;

class schedulesController extends Controller
{
    // membuat jadwal
    // public function createschedules(Request $request)
    // {
    //     $schedules= new schedules();

    //     // proses generate uuid
    //     // $schedules->id_schedules = Uuid::uuid()->toString();
    //         $schedules->id_schedule = $request->id_schedule;

    //     //get data dan input
    //     $schedules->id_field = $request->id_field;
    //     $schedules->id_booking = $request->id_booking;
    //     $schedules->date = $request->date;
    //     $schedules->day = $request->day;
    //     $schedules->start_time = $request->start_time;
    //     $schedules->end_time = $request->end_time;
    //     $schedules->price = $request->price;
    //     $schedules->down_payment = $request->down_payment;
    //     // $schedules->booking_status =0;
    //     $schedules->booking_status= $request->booking_status;
    //     $schedules->created_at = $request->createat;
    //     $schedules->created_by = $request->createby;

    //     $schedules->save();
    //     return $schedules;

    // }

    public function createschedules(Request $request)
    {
        $schedule = new Schedules();
        $schedule->id_schedule = (String) Str::uuid();
        $schedule->id_schedule = $request->id_schedule;
        $schedule->id_field = $request->id_field;
        $schedule->id_booking = $request->id_booking;
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
        try{
            $schedule->save();
            return response()->json([
                'message' => 'Succesfully insert data.',
                'serve' => $schedule
            ], 201); 
        }catch (Expection $e){
            return response()->json([
                'message' => 'Succesfully insert data.',
                'serve' => report($e)
            ],408);
        }
    }
    
    //mendapatkan jadwal (id lapang)
    public function getSchedule($id_field)
    {
        try{
            $schedules = schedules::where('id_field', $id_field)->get();
            return response()->json([
                'message' => 'Succesfully retrieved data.',
                'serve' => $schedules
            ], 200);  
        }catch (Exception $e){
            return response()->json([
                'message' => 'Unuccesfully retrieved data.',
                'serve' => report($e)
            ], 408);
        }
    }

    public function index()
    {
        return scheduless::all();
    } 
}
