<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\users;
// use App\Http\Controllers\API\ApiTokenController;

class UsersController extends Controller
{
    //============== GET USER ==============//
    // Mengambil semua data di tabel user    
    public function getAllUser(){
        return users::all();
    }
    // Mengambil semua data admin
    public function getAdmin(){
        $admin = users::where('users_type',0)->get();
        return $admin;
    }
    // Mengambil semua data client
    public function getClient(){
        $client = users::where('users_type',1)->get();
        return $client;
    }
    // Mengambil semua data user
    public function getUser(){
        $user = users::where('users_type',2)->get();
        return $user;
    }


    //============== SEARCH USER ==============//
    // Mengambil data dari tabel user berdasarkan nama atau email
    public function searchAllUser($name){
        $user = users::where('name','LIKE',"%$name%")
                                ->orwhere('email','LIKE',"%$name%")
                                ->get();
        return $user;
    }

    // Mengambil data admin berdasarkan nama
    public function searchAdmin($name){
        $admin = users::where('users_type',0)
                                ->where('name','LIKE',"%$name%")
                                // ->orwhere('email','LIKE',"%$name%")
                                ->get();                                
        return $admin;
    }
    // Mengambil data client berdasarkan nama
    public function searchClient($name){
        $client = users::where('users_type',1)
                                ->where('name','LIKE',"%$name%")
                                ->get();                                
        return $client;
    }
    // Mengambil data user berdasarkan nama
    public function searchUser($name){
        $user = users::where('users_type',2)
                                ->where('name','LIKE',"%$name%")
                                ->get();                                
        return $user;
    }


    //============== UPDATE USER ==============//
    public function updateAdmin(Request $request, $iduser){
        users::where('id_users',$iduser)->update([
            'email' => $request->email,
            'name' => $request->name,
            'account_number' => $request->account_number,
            'phone_number' => $request->phone_number, 
        ]);
        
        return "Data Admin berhasil diupdate...";
    }

    //============== DELETE USER ==============//
    // Hapus client (soft deleting)
    public function deleteClient($email){
        users::where('email',$email)->delete();

        return "Client telah dihapus";
    }
    // Hapus client (soft deleting)
    public function deleteUser($email){
        users::where('email',$email)->delete();

        return "User telah dihapus";
    }
    // Hapus client (soft deleting)
    public function deleteAdmin($email){
        users::where('email',$email)->delete();

        return "Admin telah dihapus";
    }


    // // Mengambil data client berdasarkan email
    // public static function getIdClient($email){
    //     $idClient = users::where('email',$email)->first();
    //     return $idClient->id_users;
    // }



    protected function createUser(Request $request)
    {
        users::create([
            'id_users' => (string) Str::uuid(),
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'name' => $request->name,
            'account_number' => $request->account_number,
            'phone_number' => $request->phone_number,
            'users_type' => 2,
            'users_photo' => $request->users_photo,
            // 'api_token' => Str::random(60),
        ]);

        return "Pendaftaran user berhasil...";
    }
}
