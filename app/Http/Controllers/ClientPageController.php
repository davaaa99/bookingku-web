<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientPageController extends Controller
{
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
}
