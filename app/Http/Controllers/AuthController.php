<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use Illuminate\Auth\Events\Registered;

class AuthController extends Controller
{
    public function Showlogin() {
        return view('auth.login');
    }

    function login(Request $request)
    {
        //return $request;
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ],[
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
        ]);

        if (Auth::attempt($credentials)) {
            if (!Auth::user()->is_verified) {
                Auth::logout();
                return back()->withErrors([
                    'verifikasi' => 'Akun belum diverifikasi! Cek email untuk kode verifikasi.'
                ])->withInput();
            }
            $request->session()->regenerate();
            //return redirect('/tarnsaction');
            return redirect()->intended('/transaction')->with('success', 'selamat datang ');
        }

        return back()->withErrors([
            'email' => 'email dan password salah'
        ])->withInput();
    }


    // melakukan register

    public function showRegister() {
        return view('auth.register');
    }

    public function Register(Request $request) {
    
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ],[
            'email.unique' => 'Email sudah terdaftar, silakan gunakan email lain.',
            'password.confirmed' => 'Konfirmasi password tidak sesuai.',
            'password.min' => 'Password minimal 6 karakter.',
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
        ]);

        //membuat code acak untuk verifikasi email

        $code = rand(100000,999999);


        // simpan user dengan password di-hash
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_verfied' => false,
            'verified_code' => $code,
            
        ]);

        // event untuk verifikasi email (jika pakai fitur bawaan Laravel)
        // event(new Registered($user));

        // mengirim email verifikasi
        Mail::raw('kode akun anda :' .$code  , function ($message) use ($request) {
            $message->to($request->email)->subject('Kode Verifikasi akun anda');
        });



        // // langsung login setelah register
        // Auth::login($user);

        // redirect ke halaman blog
        return redirect('/verifikasi-register?email='. urlencode($request->email))->with('success', 'Selamat datang ' . $user->name);
    }

    public function showVerifikasiRegister() {
        return view('auth.verifikasi-register');
    }




    public function verifikasiRegister(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'code' => 'required|numeric'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['gmail belum terdaftar']);
        }

        if($user->verified_code != $request->code) {
            return back()->withErrors(['kode anda salah']);
        }

        $user->update([
            'is_verified' => true,
            'verified_code' => null
        ]);

        return redirect()->intended('/login')->with('success', 'selamat datang ');
    }


    public function seedverfikasilogin(Request $request){
        
        $user = User::where('email' , $request->email);

        $code = rand(1000000, 9999999);

        $user->update([
            'verified_code' => $request->code
        ]);

        Mail::raw('kode akun anda :' .$code  , function ($message) use ($request) {
            $message->to($request->email)->subject('Kode Verifikasi akun anda');
        });

        return redirect('/verifikasi-register?email='. urlencode($request->email))->with('success', 'tolong isi code nya');

    }

    public function showForgetPassword() {
        return view('auth.forgot-password');
    }

    public function forgetpassword(Request $request) {

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->withErrors('email belum terdaftar !!!');
        }

        $code = rand(100000,999999);

        Cache::put('reset_pass'. $request->email, $code, now()->addMinutes(10));

        Mail::raw('kode akun anda :' .$code  , function ($message) use ($request) {
            $message->to($request->email)->subject('Kode Verifikasi akun anda');
        });

    
        return redirect('/updatePassword?email='. urlencode($request->email))->with('success', 'tolong masukan kata sandi baru');
    }

    

    




    public function verivikasiResetPasssword(Request $request) {
        



         $request->validate([
        'email' => 'required|email',
        'code' => 'required',
        'password' => 'required|min:6|confirmed',
    ], [
        'email.required' => 'Email wajib diisi.',
        'email.email' => 'Format email tidak valid.',
        'code.required' => 'Kode verifikasi wajib diisi.',
        'password.required' => 'Password wajib diisi.',
        'password.min' => 'Password minimal 6 karakter.',
        'password.confirmed' => 'Konfirmasi password tidak cocok.',
    ]);

            $email = $request->email;
        $code = $request->code;

        $store_code = Cache::get('reset_pass'.$email);

        if (!$store_code) {
            return back()->withErrors('code verifikasi anda sudahh basi');
        }

        if($store_code != $code ) {
            return back()->withErrors('code anda salah');
        }

        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->is_verified = true;
        $user->save();

        Cache::forget('reset_pass'.$email);

        return redirect('/login')->with('success', 'masukan password dan email anda');
    }

    












    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

}
