<?php

namespace App\Http\Controllers\API\REST;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;
use App\Location;

class LocationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->middleware('guest');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dataLocation = Location::all();
        return $dataLocation;
        // return response()->json()([
        //     'message' => 'Succesfully retrieved data.',
        //     'serve' => $dataLocation
        // ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param array $data
     * @return \App\Location
     */
    public function create(array $data)
    {
        $dataUser = Auth::user();
        return Location::create([
            'id_location' => Uuid::uuid1()->getHex(),
            'id_users' => $dataUser->id_users,
            'location_name' => $data['location_name'],
            'location_address' => $data['location_address'],
            'description' => $data['description'],
            // 'open_time' => $data['open_time'],
            // 'closing_time' => $data['closing_time'],
            // 'location_photo' => $data['location_photo'],
            'city' => $data['city'],
            'created_by' => $dataUser->name,
            'updated_by' => $dataUser->name,
        ]);
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
        $idUser = Auth::user()->id_users;
        $dataLocation = Location::where('id_users',$idUser)->get();
        return $dataLocation;
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
        Location::where('id_location',$id)->delete();

    }
}
