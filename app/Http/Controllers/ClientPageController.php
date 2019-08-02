<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientPageController extends Controller
{
     /**
     * Display manage Schedule
     * 
     * @return View
     */
    public function manageSchedule(){
        
        return view('client.manageSchedule');
    }
}
