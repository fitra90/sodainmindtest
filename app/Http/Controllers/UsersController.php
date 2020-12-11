<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function getLogin(Request $post){
        // echo "loginhere";
        $post->validate([
            'username' => 'required | max:10',
            'password' => 'required | min: 5'
        ]);
        return $post->input();
    }
}
