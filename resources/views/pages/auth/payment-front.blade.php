@extends('pages.auth.layout')
@section('title', 'Payment Page')
@section('content')
<form class="login100-form validate-form flex-sb flex-w" data-cc-on-file="false"
    data-stripe-publishable-key="pk_test_C1Dps41NlB8MZT1fetvxQ3VU00MkEEzzJG" id="payment-form" method="POST"
    action="/auth/pay">

    @csrf
    <span class="login100-form-title p-b-53">
        <img src="/assets/img/brand/blue.png" width="250px" />
        <br>

    </span>
    <div class="col-md-12 col-sm-12">
        @if($is_payment_fail)
        <div class="alert alert-danger" role="alert">
            <b>Sorry!</b> &nbsp; Payment fail, please try again.
        </div>
        @endif
    </div>
    <div class="p-t-13 p-b-9">
        <span class="txt1">
            Name on Card
        </span>
    </div>
    <div class="wrap-input100 validate-input" data-validate="Name is required">
        <input class="input100" type="text" name="username">
        <span class="focus-input100"></span>
    </div>
    <div class="p-t-13 p-b-9">
        <span class="txt1">
            Card Number
        </span>
    </div>
    <div class="wrap-input100 validate-input" data-validate="Card Number is required">
        <input class="input100" type="number" name="card-number">
        <span class="focus-input100"></span>
    </div>

    <div class="row p-t-13 p-b-9">
        <div class="col-md-4">
            <span class="txt1">
                CVC
            </span>
            <div class="wrap-input100 validate-input" data-validate="CVC is required">
                <input class="input100" type="number" name="cvc">
            </div>
        </div>

        <div class="col-md-4">
            <span class="txt1">
                Exp. Month
            </span>
            <div class="wrap-input100 validate-input" data-validate="CVC is required">
                <input class="input100" type="number" name="cvc">
            </div>
        </div>

        <div class="col-md-4">
            <span class="txt1">
                Exp. Year
            </span>
            <div class="wrap-input100 validate-input" data-validate="CVC is required">
                <input class="input100" type="number" name="cvc">
            </div>
        </div>

    </div>
    <div class="p-t-13 p-b-9">
        <span class="txt1">
            Total <h3> ${{$plan->price}} ({{$plan->title}}) </h3>
        </span>
    </div>
    @if($data->plan > 0)
    <input name="username" value="{{$data->username}}" type="hidden" />
    <input name="password" value="{{$data->password}}" type="hidden" />
    <input name="email" value="{{$data->email}}" type="hidden" />
    <input name="plan" value="{{$data->plan}}" type="hidden" />
    @endif
    <div class="container-login100-form-btn m-t-17">
        <button class="login100-form-btn" type="submit">
            Pay & Register
        </button>
    </div>
    <div class="w-full text-center p-t-30">
    <img src="../images/stripe.png" width="40%">
<br>
<br>
        <span class="txt2">
            Already a member?
        </span>

        <a href="/auth/login" class="txt2 bo1">
            Log in now
        </a>
    </div>
</form>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>


@stop