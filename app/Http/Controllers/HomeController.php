<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($session=null) {
        

        return view('pages/landing', array('session'=>$session));
    }
}
