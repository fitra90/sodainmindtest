<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubscriptionsController extends Controller
{
    //
    public function index() {
        return view('/pages/subscription');
    }

    public function plan($id) {
        return view('pages.plan');

    }
}
