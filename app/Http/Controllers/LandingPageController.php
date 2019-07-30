<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class landingPageController extends Controller
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
