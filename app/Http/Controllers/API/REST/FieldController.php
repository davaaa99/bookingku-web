<?php

namespace App\Http\Controllers\API\REST;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;
use App\Field;
use Mockery\CountValidator\Exception;
use Illuminate\Support\Facades\Auth;
use App\Location;

class FieldController extends Controller
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
     * Display a listing of the field.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $dataField = Field::all();
        }catch (Exception $e){
            return response()->json([
                'message' => 'Failed retrieve data.' . $e->getMessage(),
                'serve' => []
            ],500);
        }
       
        return response()->json([
            'message' => 'Succesfully retrieved data.',
            'serve' => $dataField
        ], 200);
    }

    /**
     * Display a listing of the field based on id_location.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show($id_location){
        try{
            $field = Field::where('id_location',$id_location)->get();
        }catch (Exception $e){
            return response()->json([
                'message' => 'Failed retrieve data.' . $e->getMessage(),
                'serve' => []
            ],500);
        }
        
		return response()->json([
            'message' => 'Succesfully retrieved data.',
            'serve' => $field
        ],200);
    }
    
    /**
     * Display the specified field based on entered name of field.
     *
     * @param  String $field_name
     * @return \Illuminate\Http\Response
     */
    public function search($field_name)
    {
        try{
            $field = Field::where('field_name','LIKE',"%$field_name%")->get();
        }catch(Exception $e){
            return response()->json([
                'message' => 'Failed retrieve data.' . $e->getMessage(),
                'serve' => []
            ], 500);
        }

        return response()->json([
            'message' => 'Successfully retrieved data.',
            'serve' => $field
        ], 200);
    }

    /**
     * Create and store a new field.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try{
            $dataUser = Auth::user();
            $kind_of_field = DB::table('kind_of_fields')->where('name_of_kind',$request->name_of_kind)->first();

            $field = new Field();
            $field->id_field = Uuid::uuid1()->getHex();
            $field->id_kind_of_field = $kind_of_field->id_kind_of_field;
            $field->id_location = $request->id_location;
            $field->field_type = $request->field_type;
            $field->field_name = $request->field_name;
            $field->field_photo = $request->field_photo;
            $field->created_by = $dataUser->email;
            $field->updated_by = $dataUser->email;
            $field->save();

        }catch(Exception $e){
            return response()->json([
                'message' => 'Failed save data.' . $e->getMessage(),
                'serve' => []
            ], 500);
        }

        return response()->json([
            'message' => 'Successfully saved data.',
            'serve' => $field
        ], 200);
    }

    /**
     * Update the specified field in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  String  $id_field
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_field)
    {
        try{
            $dataUser = Auth::user();

            $field = Field::find($id_field);
            $field->field_type = $request->field_type;
            $field->field_name = $request->field_name;
            $field->field_photo = $request->field_photo;
            $field->updated_by = $dataUser->email;
            $field->save();

        }catch(Exception $e){
            return response()->json([
                'message' => 'Failed update field data.' . $e->getMessage(),
                'serve' => []
            ], 500);
        }

        return response()->json([
            'message' => 'Successfully updated field data.',
            'serve' => []
        ], 200);
    }

    /**
     * Remove the specified field from storage.
     *
     * @param  String $id_field
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_field)
    {
        try{
            $dataUser = Auth::user();

            $field = Field::find($id_field);
            $field->updated_by = $dataUser->email;
            $field->save();
            Field::where('id_field',$id_field)->delete();
        }catch (Exception $e){
            return response()->json([
            'message' => 'Failed delete data.' . $e->getMessage(),
            'serve' => []
            ],500);
        }

        return response()->json([
            'message' => 'Succesfully deleted data.',
            'serve' => []
        ],200);
    }

    
}
