<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    
    /**
     * Display Verify Booking
     * 
     * @return View
     */
    public function index (){
        return view('admin.verifyBooking');
    }

    
    /**
     * Display Verify Booking List
     * 
     * @return View
     */
    public function verifyBookingDetail($id){
        
        $data = base64_decode($id);
        return view('admin.verifyBookingDetail',['id' => $data]);
    }

    
    /**
     * Display Client List
     * 
     * @return View
     */
    public function clientList(){
        return view('admin.clientList');
    }

    
    /**
     * Display Client List Detail Lokasi
     * 
     * @return View
     */
    public function clientListDetailLokasi($id){
        
        $data = base64_decode($id);
        // $data = $id;
        
        return view('admin.clientListDetailLokasi',['id' => $data]);
    }


    /**
     * Display Client List Detail Lapangan
     * 
     * @return View
     */
    public function clientListDetailLapangan($id){
        $data = base64_decode($id);
        return view('admin.clientListDetailLapangan',['id'=>$data]);
    }

    /**
     * Display Payment
     * 
     * @return View
     */
    public function payment(){
        return view('admin.payment');
    }

    /**
     * Display Payment Detail
     * 
     * @return View
     */
    public function paymentdetail($id){
        $data = base64_decode($id);
        return view('admin.paymentdetail',['id'=>$data]);
    }
    
}
