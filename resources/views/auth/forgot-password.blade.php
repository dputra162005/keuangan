@extends('auth.layouts.appAuth')
@section('content')
<section>
    <div class="modal-register">
        <form action="{{ url('/forgetpassword') }}" method="POST">
            @csrf
        <div class="register-container">
            <div class="logo">
                <img class="register-img" id="profile" src="https://i.pravatar.cc/300" alt="Profile Image">
            </div>
            <div class="register-content">
                <input name="email" type="email" placeholder="email">
                <button type="submit" >SEND</button>
                </form>
            </div>
            <div class="back-login">
                <p>back to</p>
                <a href="{{ url('/login') }}">Login</a>
            </div>
        </div>
    </div>
</section>
@endsection