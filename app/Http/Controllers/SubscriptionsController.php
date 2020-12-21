<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Mail\ArgonEmail;
use Illuminate\Support\Facades\Mail;

class SubscriptionsController extends Controller
{
    //
    public function index() {
        return view('/pages/subscription');
    }

    public function plan($id) {
        return view('pages.plan');

    }

    public function sendActivationEmail($target) {
       
        $kirim = Mail::to($target)->send(new ArgonEmail($target));
    
    }

    public function getPayment(Request $post) {
        // var_dump($post->rahasia); die();
       
            // return "Congrats payment complete";
            $user = new User;
            $user->username = $post->username;
            $user->email = $post->email;
            $user->password = sha1($post->pass);
            $user->role = 2;
            $user->is_login = 0;
            $user->is_active = 0;
            if($user->save()) {
                //add subscription
                $reg_user = User::where('email', '=', $post->email)->first();
                $subs = new Subscription;
                $subs->id_user = $reg_user->id;
                $subs->id_plan = $post->plan;
                $subs->is_trial = 0;
                $subs->trial_end = null;
                $subs->is_paid = 1;
                $subs->status = 1;
                if($subs->save()){
                \Stripe\Stripe::setApiKey("sk_test_51GJrY3KNF4OBPGr3RVnkp5n20VPvw5AenH9vDZjlUCD6FxkNVFf5lVYvA89lTU7AErF7mTdbBQLHDEEcwJHUti4n00WPO3ygym");
                $charge = \Stripe\Charge::create([
                    'amount' => $post->amount."00",
                    'currency' => 'usd',
                    'description' => $post->description,
                    'source' => $post->stripeToken
                ]);
                if($charge){
                    $this->sendActivationEmail($post->email);
                    return redirect('/confirm');
                }
            } else {
                echo "Registraion failed. <a href='/'> back to home </a>";
            } 
        }
        else {
            return view('pages.auth.payment-fail', array());
        }
    }

    public function upgradePlan(Request $post){
        // var_dump($post->id_user); die();
        \Stripe\Stripe::setApiKey("sk_test_51GJrY3KNF4OBPGr3RVnkp5n20VPvw5AenH9vDZjlUCD6FxkNVFf5lVYvA89lTU7AErF7mTdbBQLHDEEcwJHUti4n00WPO3ygym");
        $charge = \Stripe\Charge::create([
            'amount' => $post->amount."00",
            'currency' => 'usd',
            'description' => $post->description,
            'source' => $post->stripeToken
        ]);
        if($charge){
            // $this->sendActivationEmail($post->email);
            $upgrade = Subscription::where('id_user', "=", $post->id_user)->update(array(
                'is_paid' => 1,
                'trial_end' => null,
                'is_trial' => 0
            ));
            
            return redirect('/user-dashboard');
        }
    }
}