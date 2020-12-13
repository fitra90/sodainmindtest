<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\ArgonEmail;
use Illuminate\Support\Facades\Mail;

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

    public function showRegisterForm() {
        return view('pages.auth.register', array('is_email_taken'=> false));
    }

    public function postRegister(Request $post){
        //check if email 
        $is_email_taken = User::where('email', '=', $post->email)->first();
        
        if($is_email_taken) {
            return view('pages.auth.register', array('is_email_taken' => true));
        } else {
            $user = new User;
            $user->username = $post->username;
            $user->email = $post->email;
            $user->password = sha1($post->pass);
            $user->role = 2;
            $user->is_login = 0;
            $user->is_active = 0;
            $is_saved = $user->save();
            if($is_saved) {
                $this->sendActivationEmail($post->email);
                return view('pages.auth.confirm');
            } else {
                echo "Registraion failed. <a href='/'> back to home </a>";
            }
        }
        
    }

    public function getUsers() {
        return User::all();
    }

    public function checkEmail($email) {
        $check = User::where('email', '=', $email)->firstOrFail();
        return $check;

    }

    public function sendActivationEmail($target) {
        $data = [
            'email' => $target,
        ];
        Mail::to($target)->send(new ArgonEmail($data));
    }
}