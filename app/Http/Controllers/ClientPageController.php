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
        $data['id'] = $id;
        
        return view('client.locationDetail',$data);
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
    public function locationEdit($id){
        $data['id'] = $id;
        return view('client.locationEdit',$data);
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
    public function editLapang($id_field){
        $data['id'] = $id_field;
        return view('client.EditLapang',$data);
    }
    public function detailLapang($id_field){
        $data['id'] = $id_field;
        return view('client.DetailLapangan',$data);
    }
    
    public function bookinglist(){
        return view('client.bookingList');
    }

    public function addbooking(){
        return view('client.addBooking');
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
