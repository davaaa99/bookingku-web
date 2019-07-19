<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPageController extends Controller
{
    //
    public function index (){
        return view('admin.verify');
    }
    public function verifydetail(){
        return view('admin.verifydetail');
    }
    public function client(){
        return view('admin.clientlist');
    }
    public function detaillokasi(){
        return view('admin.detaillokasi');
    }
    public function detaillapang(){
        return view('admin.detailLapangan');
    }
    public function payment(){
        return view('admin.payment');
    }
    public function paymentdetail(){
        return view('admin.paymentdetail');
    }
    
}
