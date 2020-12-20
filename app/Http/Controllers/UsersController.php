<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subscription;
use App\Models\Plan;
use App\Mail\ArgonEmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    public function getLogin(Request $post){
        $is_correct = User::where([['username', '=', $post->username],['password', '=', sha1($post->pass)]])->first();
        if($is_correct && $is_correct->is_active > 0 && $is_correct->role == 2) {
            $subs = User::find($is_correct->id)->getSubscription;
            if($subs) {
                $is_subscribed = $subs->status;
                $is_paid = $subs->is_paid;
            } else {
                $is_subscribed = 0;
                $is_paid = 0;
            }
            session(['user' => $is_correct->email, 'role' => '2', 'subscription'=> $is_subscribed, 'subs_paid'=>$is_paid]);
            return redirect()->action([HomeController::class, 'index']);

        } else if($is_correct && $is_correct->is_active > 0 && $is_correct->role ==1){
            session(['user' => $is_correct->email, 'role' => 1,'subscription'=>'0']);
            return redirect()->action([AdminController::class, 'index']);

        } else if($is_correct && $is_correct->is_active == 0){
            return view('pages.auth.confirm');
        } 
        else{
            return view('pages.auth.login', array('is_login_correct'=> false));
        }
    }

    public function showRegisterForm(Request $get) {
        $ref = $get->ref;
        $tier = $get->tier;
        if(session()->has('user')) {
            if(session('role') > 1) {
                return redirect('/user-dashboard?ref='.$ref.'&tier='.$tier);
            } else {
                return redirect('/admin');
            }
         } else {
            return view('pages.auth.register', array('is_email_taken'=> false, 'ref'=>$ref, 'tier'=>$tier));
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
        // $plan = DB::select("SELECT id FROM plans ORDER BY price ASC LIMIT 1");
        // $trial = DB::select("SELECT trial_day FROM settings ORDER BY id DESC LIMIT 1");
        // $today = Date("d");
        // $trialEnd = $today + $trial[0]->trial_day;

        $data->is_active = 1;
        if($data->save()) {
            // $subs = new Subscription;
            // $subs->id_user = $data->id;
            // $subs->id_plan = $plan[0]->id;
            // $subs->is_trial = 1;
            // $subs->trial_end = Date("Y-m-".$trialEnd." H:m:s");
            // $subs->is_paid = 0;
            // $subs->status = 1;
            // $subs->save();
            return view('pages.auth.activationsuccess', array());
        }else {
            return "failed to activate user!";
        }
    }

    public function directPayment(Request $post) {
        $is_email_taken = User::where('email', '=', $post->email)->first();
        $plan = Plan::where('id', '=', $post->plan)->first();
        if($is_email_taken) {
            return view('pages.auth.register', array('is_email_taken' => true));
        } else {
            return view('pages.auth.payment-front', array('is_payment_fail'=>false, 'data'=>$post, 'plan'=>$plan));
        }
    }

    public function userDashboard() {
        return view('admin.user-dashboard', array());
    }

    public function settings() {
        return view('/admin.user-setting', array());
    }

    public function getPayment(Request $post) {
        // var_dump($post->username); die();
        \Stripe\Stripe::setApiKey("sk_test_51GJrY3KNF4OBPGr3RVnkp5n20VPvw5AenH9vDZjlUCD6FxkNVFf5lVYvA89lTU7AErF7mTdbBQLHDEEcwJHUti4n00WPO3ygym");
        $charge = \Stripe\Charge::create([
            'amount' => $post->amount,
            'currency' => 'usd',
            'description' => 'Payment for '.$post->tier,
            'source' => 'pk_test_C1Dps41NlB8MZT1fetvxQ3VU00MkEEzzJG'
        ]);
        if($charge){
            $user = new User;
            $user->username = $post->username;
            $user->email = $post->email;
            $user->password = sha1($post->pass);
            $user->role = 2;
            $user->is_login = 0;
            $user->is_active = 0;
            if($user->save()) {
                //add subscription
                $reg_user = User::where('email', $post-email)->get('id');
                $subs = new Subscription;
                $subs->id_user = $reg_user->id;
                $subs->id_plan = $post->plan;
                $subs->is_trial = 0;
                $subs->trial_end = null;
                $subs->is_paid = 1;
                $subs->status = 1;
                $subs->save();
                $this->sendActivationEmail($post->email);

            } else {
                echo "Registraion failed. <a href='/'> back to home </a>";
            }
        } else {

        }
    }
}