<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\locations;

class LocationsController extends Controller
{
    public function getLocation(){
        return locations::all();
    }

    public function create(Request $request){
        $location = new locations();
        $location->id_location = Uuid::uuid()->toString();
        $location->id_users = $request->get('id_users');
        $location->location_name = $request->location_name;
        $location->location_address = $request->location_address;
        $location->description = $request->description;
        $location->open_time = $request->open_time;
        $location->closing_time = $request->closing_time;
        $location->location_photo = $request->location_photo;
        $location->city = $request->city;
        // $location->create_at = $request->
        $location->created_by = $createdby;

        $location->save();
        return "Data lokasi baru masuk...";
    }
}
