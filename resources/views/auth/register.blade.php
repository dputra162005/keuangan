@extends('auth.layouts.appAuth')
@section('content')
<section>
    <div class="modal-register">
        <form action="{{ url('/register') }}" method="POST">
                    @csrf
        <div class="register-container">
            <div class="logo">
                <img class="register-img" id="profile" src="https://i.pravatar.cc/300" alt="Profile Image">
            </div>
            <div class="register-content">
                
                <input name="name" type="text" placeholder="nama">
                <input name="email" type="email" placeholder="email">
                <input name="password" type="password" placeholder="password">
                <input name="password_confirmation" type="password" placeholder="konfirmasi password"> 
                <button type="submit" >REGISTER</button>
                </form>
            </div>
            <div class="back-login">
                <p>back to</p>
                <a href="{{ url('/login') }}">login</a>
            </div>
        </div>
    </div>
</section>
@endsection