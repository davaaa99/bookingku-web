<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
      /**
     * Display index
     * 
     * @return View
     */
    public function index(){
        return view('landing.landingPage');
    }
}
