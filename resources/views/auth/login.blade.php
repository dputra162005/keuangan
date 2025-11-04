@extends('auth.layouts.appAuth')
@section('content')

<section class="">
        <form action="{{ url('/login') }}" method="POST">
            @csrf
        <div class="modal-register">
            <div class="register-container">
                <div class="logo">
                    <img class="register-img" id="profile" src="https://i.pravatar.cc/300" alt="Profile Image">
                </div>
                <div class="register-content">
                    <input name="email" type="email" placeholder="email">
                    <input name="password" type="password" placeholder="password">
                    <button type="submit" >LOGIN</button>
                     </form>
                    <a href="{{ url('/forgetpassword') }}">forget password</a>
                    @if ($errors->has('verifikasi'))
                        <form action="{{ url('/seedverfikasilogin') }}" method="post">
                            @csrf
                            <input name="email" type="hidden" value="{{ old('email') }}">
                            <button type="submit" >seed</button>
                        </form>
                    @endif
                    
                </div>
                <div class="back-login">
                    <p>back to</p>
                    <a href="{{ url('/register') }}">Register</a>
                </div>
            </div>
        </div>
       
    </section>
@endsection