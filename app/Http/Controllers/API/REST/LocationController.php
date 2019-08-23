<?php

namespace App\Http\Controllers\API\REST;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;
use App\Location;
use App\Location_schedule;
use Mockery\CountValidator\Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use App\Http\Resources\PostCollection;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;

class LocationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the location.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $dataLocation = Location::all();
        } catch (Exception $e) {
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
        ]);
    }

    /**
     * Create and store a new location schedule.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createLocationSchedule(array $data, $id_location)
    {
        try {
            /**
             * Location_schedule register
             */
            $dataUser = Auth::user();

            $locationSchedule = new Location_schedule();
            $locationSchedule->id_location_schedule = Uuid::uuid1()->getHex();
            $locationSchedule->id_location = $id_location;
            $locationSchedule->everyday = $data['day'][0]['open_time'] . ";" . $data['day'][0]['closing_time'];
            $locationSchedule->monday = $data['day'][1]['open_time'] . ";" . $data['day'][1]['closing_time'];
            $locationSchedule->tuesday = $data['day'][2]['open_time'] . ";" . $data['day'][2]['closing_time'];
            $locationSchedule->wednesday = $data['day'][3]['open_time'] . ";" . $data['day'][3]['closing_time'];
            $locationSchedule->thursday = $data['day'][4]['open_time'] . ";" . $data['day'][4]['closing_time'];
            $locationSchedule->friday = $data['day'][5]['open_time'] . ";" . $data['day'][5]['closing_time'];
            $locationSchedule->saturday = $data['day'][6]['open_time'] . ";" . $data['day'][6]['closing_time'];
            $locationSchedule->sunday = $data['day'][7]['open_time'] . ";" . $data['day'][7]['closing_time'];
            $locationSchedule->created_by = $dataUser->email;
            $locationSchedule->updated_by = $dataUser->email;
            $locationSchedule->save();
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Failed save data.' . $e->getMessage(),
                'serve' => []
            ], 500);
        }


        return response()->json([
            'message' => 'Successfully saved data.',
            'serve' => $locationSchedule
        ], 200);
    }

    /**
     * Create and store a new location.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {
            $validate = $this->validator($request->all());
            if ($validate->fails()) {
                return response()->json([
                    'message' => 'Unable to save data. Bad config',
                    'serve' => [
                        'error' => $validate->errors()
                    ]
                ], 500);
            }

            /**
             * Create location
             */
            $dataUser = Auth::user();

            $location = new Location();
            $location->id_location = Uuid::uuid1()->getHex();
            $location->id_user = $dataUser->id_user;
            $location->location_name = $request->location_name;
            $location->location_address = $request->location_address;
            $location->description = $request->description;
            $location->latitude = $request->latitude;
            $location->longitude = $request->longitude;
            $location->created_by = $dataUser->email;
            $location->updated_by = $dataUser->email;
            $location->save();

            /**
             * Create location schedule
             */
            $this->createLocationSchedule($request->all(), $location->id_location);
        } catch (Exception $e) {
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
     * Save location photo to storage
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
        try {
            $index = 1;
            $location = Location::find($request->id_location);
            foreach ($request->file('photo') as $loc_photo) {
                $extension = $loc_photo->getClientOriginalExtension();
                $photoName = $index . $request->id_location . '.' . $extension;
                $path = Storage::disk('public')->putFileAs('/locationPhotos', $loc_photo, $photoName);

                if($location->location_photo == null) 
                    $location->location_photo = '/storage' . '/' . $path;
                else $location->location_photo = $location->location_photo .';'. '/storage' . '/' . $path;
                $location->save();
                $index++;
            }

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Failed save data.' . $e->getMessage(),
                'serve' => []
            ], 500);
        }

        return response()->json([
            'message' => 'Successfully saved data.',
            'serve' => []
        ], 200);
    }

    /**
     * Show specified location based on client login.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        try {
            $dataUser = Auth::user();
            $idUser = $dataUser->id_user;
            $dataLocation = Location::where('id_user', $idUser)->get();
        } catch (Exception $e) {
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
        try {
            $location = locations::where('location_address', 'LIKE', "%$address%")
                ->orwhere('location_name', 'LIKE', "%$address%")
                ->get();
        } catch (Exception $e) {
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
     * Retrieve specified location data
     */
    public function locationDetail(Request $request)
    {
        try {
            $location = Location::find($request->id);
            $loc_schedule = Location_schedule::where('id_location', $location->id_location)->get();
            $location->schedule = $loc_schedule;
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Failed retrieve data.' . $e->getMessage(),
                'serve' => []
            ]);
        }
        return response()->json([
            'message' => 'Successfully retrieved data.',
            'serve' => $location
        ]);
    }

    /**
     * Update the location schedule.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateLocationSchedule(array $data)
    {
        try {
            /**
             * Location_schedule register
             */
            $dataUser = Auth::user();

            $locationSchedule = Location_schedule::where('id_location', $data['id_location'])->first();
            $locationSchedule->everyday = $data['day'][0]['open_time'] . ";" . $data['day'][0]['closing_time'];
            $locationSchedule->monday = $data['day'][1]['open_time'] . ";" . $data['day'][1]['closing_time'];
            $locationSchedule->tuesday = $data['day'][2]['open_time'] . ";" . $data['day'][2]['closing_time'];
            $locationSchedule->wednesday = $data['day'][3]['open_time'] . ";" . $data['day'][3]['closing_time'];
            $locationSchedule->thursday = $data['day'][4]['open_time'] . ";" . $data['day'][4]['closing_time'];
            $locationSchedule->friday = $data['day'][5]['open_time'] . ";" . $data['day'][5]['closing_time'];
            $locationSchedule->saturday = $data['day'][6]['open_time'] . ";" . $data['day'][6]['closing_time'];
            $locationSchedule->sunday = $data['day'][7]['open_time'] . ";" . $data['day'][7]['closing_time'];
            $locationSchedule->updated_by = $dataUser->email;
            $locationSchedule->save();
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Failed save data.' . $e->getMessage(),
                'serve' => []
            ], 500);
        }


        return response()->json([
            'message' => 'Successfully saved data.',
            'serve' => $locationSchedule
        ], 200);
    }

    /**
     * Update the location data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  String $id_location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $dataUser = Auth::user();

            $photos = $request->file('file');
            $path = $photos->store('public/locationPhotos');
            $location = Location::find($request->id_location);
            $location->location_name = $request->location_name;
            $location->location_address = $request->location_address;
            $location->description = $request->description;
            // $location->location_photo = $request->photos;
            $location->latitude = $request->latitude;
            $location->longitude = $request->longitude;
            $location->updated_by = $dataUser->email;
            $location->save();

            $this->updateLocationSchedule($request->all());
        } catch (Exception $e) {
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
        try {
            $dataUser = Auth::user();

            $location = Location::find($id_location);
            $location->updated_by = $dataUser->email;
            $location->save();
            Location::where('id_location', $id_location)->delete();
        } catch (Exception $e) {
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
