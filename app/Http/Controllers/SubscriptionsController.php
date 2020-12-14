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

    public function getPayment(Request $post) {
        \Stripe\Stripe::setApiKey("sk_test_51GJrY3KNF4OBPGr3RVnkp5n20VPvw5AenH9vDZjlUCD6FxkNVFf5lVYvA89lTU7AErF7mTdbBQLHDEEcwJHUti4n00WPO3ygym");
        $charge = \Stripe\Charge::create([
            'amount' => '10000',
            'currency' => 'usd',
            'description' => 'payment for tier',
            'source' => $post->stripeToken
        ]);
    }
}
