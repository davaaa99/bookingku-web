<?php

namespace App\Http\Controllers\API\REST;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Ramsey\Uuid\uuid;
use App\Field;

class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        try{
            $dataField = Field::all();
            return response()->json([
            'message' => 'Succesfully retrieved data.',
            'serve' => $dataField
            ], 200);   
        }catch (Exceptrion $e){
            return response()->json([
            'message' => 'Unsuccesfully retrieved data.',
            'serve' => report($e)
            ],408);
        }
       
    }

    /**
     * Display a listing of the resource by id_location.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLapangLocation($id_location){
        try{
            $field = Field::where('id_location',$id_location)->get();
            return response()->json([
                'message' => 'Succesfully retrieved data.',
                'serve' => $field
            ],200);
        }catch (Exceptrion $e){
            return response()->json([
            'message' => 'Unsuccesfully retrieved data.',
            'serve' => report($e)
            ],408);
        }
		
	}


    /**
     * Display a listing of the resource by id_field.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLapangDetail($id_field){
		try{
            $field = Field::where('id_field',$id_field)->get();
            return response()->json([
                'message' => 'Succesfully retrieved data.',
                'serve' => $field
            ],200);
        }catch (Exceptrion $e){
            return response()->json([
            'message' => 'Unsuccesfully retrieved data.',
            'serve' => report($e)
            ],408);
        }
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(array $data)
    {
        // $dataUser = Auth::user();
        return Field::create([
            'id_field' =>  Uuid::uuid()->getHex(),
            'id_location'=>$dataUser->id_location,
            // 'id_kind_of_field' => $dataUser->id_kind_of_field,
            // 'field_type' => $data['field_type'],
            // 'field_name' => $data['field_name'],
            // 'field_photo' => $data['field_foto'],
            // 'created_by'=> $dataUser->name,
            // 'updated_by'=> $dataUser->name,
            ]);

            response()->json()([
                'message'=> 'New resource is created.',
                'serve'=> $data
            ],201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_field
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_field)
    {
        $booking = bookings::where('id_field',$id_field)->update([
            'field_type' => $data['field_type'],
            'field_name' => $data['field_name'],
            'field_photo' => $data['field_foto'],
            'updated_by'=> $dataUser->name,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_field)
    {

        try{
            Field::where('id_field',$id_field)->delete();
            return response()->json([
                'message' => 'Succesfully retrieved data.',
                'serve' => $field
            ],200);
        }catch (Exceptrion $e){
            return response()->json([
            'message' => 'Unsuccesfully retrieved data.',
            'serve' => report($e)
            ],408);
        }
    }

    
}
