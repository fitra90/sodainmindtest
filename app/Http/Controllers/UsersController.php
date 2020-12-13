<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\ArgonEmail;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    public function getLogin(Request $post){
        //check password & username
        $is_correct = User::where([['username', '=', $post->username],['password', '=', sha1($post->pass)]])->first();
        // var_dump($is_correct);die();
        if($is_correct) {
            session('user', $post->username);
            return redirect()->action([HomeController::class, 'index']);

        } else {
            return view('pages.auth.login', array('is_login_correct'=> false));

        }
        
        
        // var_dump($post->input()); die();
    }

    public function showRegisterForm() {
        return view('pages.auth.register', array('is_email_taken'=> false));
    }

    public function showLoginForm() {
        if(session()->has('email')) {
            redirect('/');
        } else {
            return view('pages.auth.login', array('is_login_correct'=> true));
            
        }
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

    public function sendActivationEmail($target) {
        $data = [
            'email' => $target,
        ];
        Mail::to($target)->send(new ArgonEmail($data));
    }

    public function activateUser($email){
        $data = User::where('email', $email)->first();
        $data->is_active = 1;
        $saved = $data->save();
        if($saved) {
            return view('pages.auth.activationsuccess');
        }else {
            return "failed to activate user!";
        }
    }
}