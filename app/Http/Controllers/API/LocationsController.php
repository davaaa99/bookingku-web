<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\locations;
use App\Http\Controllers\API\UsersController;
use Illuminate\Support\Str;

class LocationsController extends Controller
{
    // Mengambil semua data lokasi
    public function getLocation(){
        return locations::all();
    }

    // Membuat lokasi baru
    public function create(Request $request){
        $location = new locations();
        $location->id_location = (string) Str::uuid();
        $location->id_users = $request->id_users;
        $location->location_name = $request->location_name;
        $location->location_address = $request->location_address;
        $location->description = $request->description;
        $location->open_time = $request->open_time;
        $location->closing_time = $request->closing_time;
        $location->location_photo = $request->location_photo;
        $location->city = $request->city;
        $location->created_by = $request->created_by;

        $location->save();
        return "Data lokasi baru masuk...";
    }

    // Mengambil lokasi by email_client
    public function getLocationClient($emailClient){
        $idClient = UsersController::getIdClient($emailClient);
        $location = locations::where('id_users',$idClient)->get();
        return $location;
    }

    // Mengambil lokasi by kota
    public function searchLocation($city){
        $location = locations::where('city',$city)->get();
        return $location;
    }
    
}
