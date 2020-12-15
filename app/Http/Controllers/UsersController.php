<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subscription;
use App\Mail\ArgonEmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    public function getLogin(Request $post){
        $is_correct = User::where([['username', '=', $post->username],['password', '=', sha1($post->pass)]])->first();
        
        if($is_correct && $is_correct->is_active > 0 && $is_correct->role == 2) {
            session(['user' => $is_correct->email, 'role' => 1]);
            return redirect()->action([HomeController::class, 'index']);

        } else if($is_correct && $is_correct->is_active > 0 && $is_correct->role ==1){
            session(['user' => $is_correct->email, 'role' => 1]);
            return redirect()->action([AdminController::class, 'index']);

        } else if($is_correct && $is_correct->is_active == 0){
            return view('pages.auth.confirm');
        } 
        else{
            return view('pages.auth.login', array('is_login_correct'=> false));
        }
    }

    public function showRegisterForm() {
        if(session()->has('user')) {
            return redirect('/');
         } else {
            return view('pages.auth.register', array('is_email_taken'=> false));
         }
    }

    public function showLoginForm() {
        if(session()->has('user')) {
           return redirect('/');
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
            if($user->save()) {
                $this->sendActivationEmail($post->email);

            } else {
                echo "Registraion failed. <a href='/'> back to home </a>";
            }
        }

        return redirect('/confirm');
        
    }

    public function getUsers() {
        return User::all();
    }

    public function sendActivationEmail($target) {
       
        $kirim = Mail::to($target)->send(new ArgonEmail($target));
    
       
        // var_dump($target); die();
    }

    public function activateUser($email){
        $data = User::where('email', $email)->first();
        $plan = DB::select("SELECT id FROM plans ORDER BY price ASC LIMIT 1");
        $trial = DB::select("SELECT trial_day FROM settings ORDER BY id DESC LIMIT 1");
        $today = Date("d");
        $trialEnd = $today + $trial[0]->trial_day;

        $data->is_active = 1;
        if($data->save()) {
            $subs = new Subscription;
            $subs->id_user = $data->id;
            $subs->id_plan = $plan[0]->id;
            $subs->is_trial = 1;
            $subs->trial_end = Date("Y-m-".$trialEnd." H:m:s");
            $subs->is_paid = 0;
            $subs->status = 1;
            $subs->save();
            return view('pages.auth.activationsuccess');
        }else {
            return "failed to activate user!";
        }
    }
}