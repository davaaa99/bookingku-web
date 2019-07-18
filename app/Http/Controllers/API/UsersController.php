<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\users;

class UsersController extends Controller
{
    public function getClient(){
        return users::all();
    }

    public static function getIdClient($email){
        $idClient = users::where('email',$email)->first();
        return $idClient->id_users;
    }

    public function deleteClient($email){
        users::where('email',$email)->delete();

        return "Client telah dihapus";
    }
}
