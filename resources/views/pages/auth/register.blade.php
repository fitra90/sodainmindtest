@extends('pages.auth.layout')
@section('title', 'Register Page')
@section('content')
<form class="login100-form validate-form flex-sb flex-w" method="POST" action="/auth/register">
    @csrf
    <span class="login100-form-title p-b-53">
        Register With
    </span>

    <a href="#" class="btn-face m-b-20">
        <i class="fa fa-facebook-official"></i>
        Facebook
    </a>

    <a href="#" class="btn-google m-b-20">
        <img src="../images/icons/icon-google.png" alt="GOOGLE">
        Google
    </a>

    <div class="p-t-31 p-b-9">
        <span class="txt1">
            Username
        </span>
    </div>
    <div class="wrap-input100 validate-input" data-validate="Username is required">
        <input class="input100" type="text" name="username">
        <span class="focus-input100"></span>
    </div>
    <div class="p-t-31 p-b-9">
        <span class="txt1">
            Email
        </span>
    </div>
    <div class="wrap-input100 validate-input" data-validate="Email is required">
        <input class="input100" type="email" name="email">
        <span class="focus-input100"></span>
    </div>

    <div class="p-t-13 p-b-9">
        <span class="txt1">
            Password
        </span>
    </div>
    <div class="wrap-input100 validate-input" data-validate="Password is required">
        <input class="input100" type="password" name="pass">
        <span class="focus-input100"></span>
    </div>

    <div class="container-login100-form-btn m-t-17">
        <button class="login100-form-btn" type="submit">
            Register
        </button>
    </div>

    <div class="w-full text-center p-t-55">
        <span class="txt2">
            Already a member?
        </span>

        <a href="/auth/login" class="txt2 bo1">
            Log in now
        </a>
    </div>
</form>
@stop