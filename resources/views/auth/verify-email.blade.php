@extends('layouts.app')
@section('content')
<section>
        <form action="{{ url('/email/verification-notification') }}" method="POST">
            @csrf
        <div class="modal-register">
            <div class="register-container">
                <div class="logo">
                    <img class="register-img" id="profile" src="https://i.pravatar.cc/300" alt="Profile Image">
                </div>
                <div class="register-content">
                    <h2 style="text-align: center" >Verify Your Email Address</h2>
                    <button type="submit" >SEND</button>
                </div>
                <div class="back-login">
                    <p>back to</p>
                    <a href="{{ url('/register') }}">Register</a>
                </div>
            </div>
        </div>
        </form>
    </section>
@endsection