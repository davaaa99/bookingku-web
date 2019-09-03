<?php

namespace App\Http\Controllers\API\REST;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mockery\CountValidator\Exception;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;
use App\Kind_of_field;

class KindOfFieldController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct(Request $request)
    // {
    //     // $this->middleware(['auth:api']);
    // }

    /**
     * Display a listing of the kind of field.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $kindoffield = Kind_of_field::all();
        }catch(Exception $e){
            return response()->json([
                'message' => 'Failed retrieve data.'.$e->getMessage(),
                'serve' => []
            ], 500);
        }

        return response()->json([
            'message' => 'Successfully retrieved data.',
            'serve' => $kindoffield
        ], 200);
    }

    

    /**
     * Create and store a new kind of field.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try{
            $admin = Auth::user();

            $kindoffield = new Kind_of_field();
            $kindoffield->id_kind_of_field = Uuid::uuid1()->getHex();
            $kindoffield->name_of_kind = $request->name_of_kind;
            $kindoffield->description = $request->description;
            $kindoffield->created_by = $admin->email;
            $kindoffield->updated_by = $admin->email;
            $kindoffield->save();
        }catch(Exception $e){
            return response()->json([
                'message' => 'Failed save data.' .$e->getMessage(),
                'serve' => []
            ], 500);
        }

        return response()->json([
            'message' => 'Successfully saved data.',
            'serve' => $kindoffield
        ], 200);
    }

    /**
     * Update the specified kind of field in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  String $id_kind_of_field
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_kind_of_field)
    {
        try{
            $admin = Auth::user();

            $kindoffield = Kind_of_field::find($id_kind_of_field);
            $kindoffield->name_of_kind = $request->name_of_kind;
            $kindoffield->description = $request->description;
            $kindoffield->updated_by = $admin->email;
            $kindoffield->save();
        }catch(Exception $e){
            return response()->json([
                'message' => 'Failed update data.'. $e->getMessage(),
                'serve' => []
            ], 500);
        }

        return response()->json([
            'message' => 'Successfully updated data.',
            'serve' => []
        ], 200);
    }

    /**
     * Remove the specified kind of field from storage.
     *
     * @param  String $id_kind_of_field
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_kind_of_field)
    {
        try{
            $admin = Auth::user();

            $kindoffield = Kind_of_field::find($id_kind_of_field);
            $kindoffield->updated_by = $admin->email;
            $kindoffield->save();
            Kind_of_field::where('id_kind_of_field',$id_kind_of_field)->delete();
        }catch(Exception $e){
            return response()->json([
                'message' => 'Failed delete data.' . $e->getMessage(),
                'serve' => []
            ], 500);
        }

        return response()->json([
            'message' => 'Successfully deleted data.',
            'serve' => []
        ], 200);
    }
}
