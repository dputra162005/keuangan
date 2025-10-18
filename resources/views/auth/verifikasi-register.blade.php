@extends('layouts.app')
@section('content')
<section>
        <form action="{{ url('/verfikasi-register') }}" method="POST">
            @csrf
        <div class="modal-register ">
            <div class="register-container">
                <div class="logo">
                    <img class="register-img" id="profile" src="https://i.pravatar.cc/300" alt="Profile Image">
                </div>
                <div class="register-content">
                    <input name="email" type="hidden" value="{{ request('email') }}">
                    <input name="code" type="teks" placeholder="code">
                    <button type="submit" >kirim</button>
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