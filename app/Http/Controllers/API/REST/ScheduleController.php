<?php

namespace App\Http\Controllers\API\REST;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Auth;
use Mockery\CountValidator\Exception;
use App\Schedule;

class ScheduleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->middleware(['auth:api']);
    }

    /**
     * Display a listing of the schedule.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $schedules = Schedule::all();
            
        }catch (Exception $e){
            return response()->json([
                'message' => 'Failed retrieved data.'. $e->getMessage(),
                'serve' => []
            ], 500);
        }
        return response()->json([
            'message' => 'Succesfully retrieved data.',
            'serve' => $schedules
        ], 200);  
    }

    /**
     * Create and store a new schedule.
     *
     * @param \Illuminate\Http\Request  $request
     * @param String $id_field
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id_field)
    {
        try{
            $dataUser = Auth::user();

            $start_time = $request->start_time;
            while ($start_time < $request->end_time) {
                $schedule = new Schedule();
                $schedule->id_schedule = Uuid::uuid1()->getHex();
                $schedule->id_field = $id_field;
                $schedule->day = $request->day;
                $schedule->start_time = $start_time;
                $schedule->end_time = date("H:i", strtotime($start_time) + 60*60);
                $schedule->price = $request->price;
                $schedule->down_payment = $request->down_payment;
                $schedule->booking_status= 0;
                $schedule->created_by = $dataUser->email;
                $schedule->updated_by = $dataUser->email;
                $schedule->save();
                $start_time = date("H:i", strtotime($start_time) + 60*60);
            }
        }catch (Exception $e){
            return response()->json([
                'message' => 'Failed insert data.'. $e->getMessage(),
                'serve' => []
            ],500);
        }
        return response()->json([
            'message' => 'Succesfully insert data.',
            'serve' => $schedule
        ], 201); 
    }

    /**
     * Display the specified schedule based on id_field.
     *
     * @param  String $id_field
     * @return \Illuminate\Http\Response
     */
    public function show($id_field)
    {
        try{
            $schedules = Schedule::where('id_field', $id_field)->get();
            
        }catch (Exception $e){
            return response()->json([
                'message' => 'Failed retrieved data.'. $e->getMessage(),
                'serve' => []
            ], 500);
        }
        return response()->json([
            'message' => 'Succesfully retrieved data.',
            'serve' => $schedules
        ], 200);  
    }

    /**
     * Update the specified schedule in storage.
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
     * Remove the specified schedule from storage.
     *
     * @param  String $id_schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_schedule)
    {
        try{
            $dataUser = Auth::user();

            $schedule = Schedule::find($id_schedule);
            $schedule->updated_by = $dataUser->email;
            $schedule->save();
            Schedule::where('id_schedule',$id_schedule)->delete();
        }catch(Exception $e){
            return response()->json([
                'message' => 'Failed deleted data.' . $e->getMessage(),
                'serve' => []
            ]);
        }

        return response()->json([
            'message' => 'Successfully deleted data.',
            'serve' => []
        ]);
    }
}
