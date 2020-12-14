<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        // var_dump(session('role')); die();
        if(session('role') == 1) {
            return view('admin.dashboard');
        } else {
            return redirect('/auth/login');
        }
    }
}
