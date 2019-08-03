<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientPageController extends Controller
{
    /**
     * Display Dashboard
     * 
     * @return View
     */
    public function index (){
        return view('client.dashboard');
    }

    /**
     * Display Location List
     * 
     * @return View
     */
    public function locationList(){
        return view('client.locationList');
    }

    /**
     * Display Location Detail
     * 
     * @param String $id
     * @return View
     */
    public function locationDetail($id){
        $data = base64_decode($id);
        
        return view('client.locationDetail',['id' => $data]);
    }

    /**
     * Display Form Add Location
     * 
     * @param String $id
     * @return View
     */
    public function locationAdd(){
        
        return view('client.locationAdd');
    }
    
}
