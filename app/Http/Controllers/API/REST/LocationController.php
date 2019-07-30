<?php

namespace App\Http\Controllers\API\REST;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;
use App\Location;
use Mockery\CountValidator\Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;


class LocationController extends Controller
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
     * Display a listing of the location.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $dataLocation = Location::all();
        }catch (Exception $e){
            return response()->json()([
                'message' => 'Failed retrieve data.' . $e->getMessage(),
                'serve' => []
            ], 500);
        }

        return response()->json([
            'message' => 'Successfully retrieved data.',
            'serve' => $dataLocation
        ], 200);
    }

    /**
     * Get a validator for an incoming location registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'location_name' => ['required', 'string', 'max:50'],
            'location_address' => ['required', 'string', 'max:255'],
            'open_time' => ['required', 'date_format:H:i'],
            'closing_time' => ['required', 'date_format:H:i','after:open_time'],
        ]);
    }

    /**
     * Create and store a new location.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try{
            $validate = $this->validator($request->all());
            if ($validate->fails()){
                return response()->json([
                    'message' => 'Unable to save data. Bad config',
                    'serve' => [
                        'error' => $validate->errors()
                    ]
                ], 500);
            }
    
            /**
             * Location register
             */
            $dataUser = Auth::user();
    
            $location = new Location();
            $location->id_location = Uuid::uuid1()->getHex();
            $location->id_user = $dataUser->id_user;
            $location->location_name = $request->location_name;
            $location->location_address = $request->location_address;
            $location->description = $request->description;
            $location->open_time = $request->open_time;
            $location->closing_time = $request->closing_time;
            $location->location_photo = $request->location_photo;
            $location->latitude = $request->latitude;
            $location->longitude = $request->longitude;
            $location->created_by = $dataUser->email;
            $location->updated_by = $dataUser->email;
            $location->save();
        }catch(Exception $e){
            return response()->json([
                'message' => 'Failed save data.' . $e->getMessage(),
                'serve' => []
            ], 500);
        }


        return response()->json([
            'message' => 'Successfully saved data.',
            'serve' => $location
        ], 200);
    }

    /**
     * Show specified location based on client login.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        try{
            $idUser = Auth::user()->id_user;
            $dataLocation = Location::where('id_user',$idUser)->get();
        }catch(Exception $e){
            return response()->json([
                'message' => 'Failed retrieve data.' . $e->getMessage(),
                'serve' => []
            ], 500);
        }

        return response()->json([
            'message' => 'Successfully retrieved data.',
            'serve' => $dataLocation,
        ], 200);
    }

    /**
     * Display the specified location based on entered location .
     *
     * @param  String $address
     * @return \Illuminate\Http\Response
     */
    public function search($address)
    {
        try{
            $location = locations::where('city','LIKE',"%$address%")
                                ->orwhere('location_address','LIKE',"%$address%")
                                ->orwhere('location_name','LIKE',"%$address%")
                                ->get();
        }catch(Exception $e){
            return response()->json([
                'message' => 'Failed retrieve data.',
                'serve' => report($e)
            ], 500);
        }

        return response()->json([
            'message' => 'Successfully retrieved data.',
            'serve' => $location
        ], 200);
    }

    /**
     * Update the location data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  String $id_location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_location)
    {
        try{
            $dataUser = Auth::user();

            $location = Location::find($id_location);
            $location->location_name = $request->location_name;
            $location->location_address = $request->location_address;
            $location->description = $request->description;
            $location->open_time = $request->open_time;
            $location->closing_time = $request->closing_time;
            $location->location_photo = $request->location_photo;
            $location->latitude = $request->latitude;
            $location->longitude = $request->longitude;
            $location->updated_by = $dataUser->email;
            $location->save();
        }catch(Exception $e){
            return response()->json([
                'message' => 'Failed update location data.' . $e->getMessage(),
                'serve' => []
            ], 500);
        }

        return response()->json([
            'message' => 'Successfully updated location data.',
            'serve' => []
        ], 200);
    }

    /**
     * Remove the specified location from storage.
     *
     * @param  String $id_location
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_location)
    {
        try{
            $dataUser = Auth::user();

            $location = Location::find($id_location);
            $location->updated_by = $dataUser->email;
            $location->save();
            Location::where('id_location',$id_location)->delete();
        }catch(Exception $e){
            return response()->json([
                'message' => 'Failed delete data.' . $e->getMessage(),
            ], 500);
        }

        return response()->json([
            'message' => 'Successfully deleted data.',
            'serve' => []
        ], 200);
    }
}
