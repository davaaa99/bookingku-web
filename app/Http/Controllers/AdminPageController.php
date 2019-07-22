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
    public function verifyBookingDetail(){
        return view('admin.verifyBookingDetail');
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
    public function clientListDetailLokasi(){
        return view('admin.clientListDetailLokasi');
    }


    /**
     * Display Client List Detail Lapangan
     * 
     * @return View
     */
    public function clientListDetailLapangan(){
        return view('admin.clientListDetailLapangan');
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
    public function paymentdetail(){
        return view('admin.paymentdetail');
    }
    
}
