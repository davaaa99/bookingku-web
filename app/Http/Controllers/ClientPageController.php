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
    public function locationDetail(){
        // $data = base64_decode($id);
        
        // return view('client.locationDetail',['id' => $data]);
        return view('client.locationDetail');
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
    
    /**
     * Display Form Add Location
     * 
     * @param String $id
     * @return View
     */
    public function locationEdit(){
        
        return view('client.locationEdit');
    }

    /**
     * Display Form Registration
     * 
     * @return View
     */
    public function register(){
        
        return view('landing.registerPage');
    }

    /**
     * Display Form Login
     * 
     * @return View
     */
    public function login(){
        
        return view('landing.loginPage');
    }
    public function menulapang(){
        return view('client.MenuLapangan');
    }

    public function addLapang(){
        return view('client.AddLapang');
    }
    public function editLapang(){
        return view('client.EditLapang');
    }
    public function detailLapang(){
        return view('client.DetailLapangan');
    }
     /**
     * Display manage Schedule
     * 
     * @return View
     */
    
    public function manageSchedule(){
        
        return view('client.manageSchedule');

    }
}
