<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function getLogin(Request $post){
        // echo "loginhere";
        // $post->validate([
        //     'username' => 'required | max:10',
        //     'password' => 'required | min: 5'
        // ]);
        // $data = $post->input();
        // $post->session()->put('user', $data['username']);
        
        // return $post->input();
        var_dump($post->input()); die();
    }

    public function getRegister(Request $post){
        $post->validate([
            'username' => 'required | max:10',
            'password' => 'required | min: 5',
            'email' => 'required | min: 5'
        ]);
        $data = $post->input();
        $post->session()->put('user', $data['user']);
        
        return $post->input();
    }

    function getUsers() {
        return User::all();
    }
}
