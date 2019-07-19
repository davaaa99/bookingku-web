<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Ramsey\Uuid\Uuid;
use App\schedules;

class schedulesController extends Controller
{
    public function createschedules(Request $request, $createdby)
    {
        $schedules= new schedules();

        // proses generate uuid
        $schedules->id_schedules = Uuid::uuid()->toString();
        
        //get data dan input
        $schedules->id_field = $request ->get ('id_field');
        $schedules->id_booking = $request ->get ('id_booking');
        $schedules->date = date();
        $schedules->day = day();
        $schedules->start_time = $request->get('start_time');
        $schedules->end_time = $request->get('end_time');
        $schedules->price = $request->price;
        $schedules->down_payment = $request->get('down_payment');
        $schedules->booking_status = 0;
        $schedules->created_at = $request->createat;
        $schedules->created_by = $request->createby;

        $schedules->save();
        return "data jadwal baru masuk";

    }

    public function index()
    {
        return scheduless::all();
    } 
}
