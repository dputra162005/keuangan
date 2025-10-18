<?php

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Controllers\TransactionController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login',[AuthController::class,'Showlogin'])->name('login');
Route::post('/login',[AuthController::class,'login'])->name('login.post');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');
Route::get('/register',[AuthController::class,'showRegister'])->name('showregister');
Route::post('/register',[AuthController::class,'Register'])->name('register.post');
Route::post('/logout',[AuthController::class,'logout'])->name('logout.post');


Route::post('/seedverfikasilogin',[AuthController::class, 'seedverfikasilogin'])->name('seedverfikasilogin.past');


Route::get('/verifikasi-register', [AuthController::class, 'showVerifikasiRegister'])->name('verifikasi.register');
Route::post('/verfikasi-register',[AuthController::class,'verifikasiRegister'])->name('verifikasi.register.post');

Route::get('/forgetpassword',[AuthController::class, 'showForgetPassword'])->name('showForgetPassword');
Route::post('/forgetpassword',[AuthController::class, 'ForgetPassword'])->name('ForgetPassword.post');
Route::post('/verivikasiResetPasssword',[AuthController::class, 'verivikasiResetPasssword']);

Route::get('/updatePassword', function () {
    return view('auth.resetPassword');
})->name('updatePassword');





// Route::get('/email/verify', function () {
//     return view('auth.verify-email');
// })->middleware('auth')->name('verification.notice');


// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill();
//     return redirect('/login');
// })->middleware(['auth', 'signed'])->name('verification.verify');

// Route::post('/email/verification-notification', function (Request $request) {
//     $request->user()->sendEmailVerificationNotification();
//     return back()->with('message', 'Verification link sent!');
// })->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// Route::get('/forgot-password', function () {
//     return view('auth.forgot-password');
// })->middleware('guest')->name('password.request');

// Route::post('/forgot-password', function (Request $request) {
//     $request->validate(['email' => 'required|email']);
 
//     $status = Password::sendResetLink(
//         $request->only('email')
//     );
 
//     return $status === Password::ResetLinkSent
//         ? back()->with(['status' => 'link reset password sudah dikirim ke email anda.'])
//         : back()->withErrors(['email' => __($status)]);
// })->middleware('guest')->name('password.email');

// Route::get('/reset-password/{token}', function (string $token) {
//     return view('auth.reset-password', ['token' => $token]);
// })->middleware('guest')->name('password.reset');

// Route::post('/reset-password', function (Request $request) {
//     $request->validate([
//         'token' => 'required',
//         'email' => 'required|email',
//         'password' => 'required|min:8|confirmed',
//     ]);
 
//     $status = Password::reset(
//         $request->only('email', 'password', 'password_confirmation', 'token'),
//         function (User $user, string $password) {
//             $user->forceFill([
//                 'password' => Hash::make($password)
//             ])->setRememberToken(Str::random(60));
 
//             $user->save();
 
//             event(new PasswordReset($user));
//         }
//     );
 
//     return $status === Password::PasswordReset
//         ? redirect()->route('login')->with('status', __($status))
//         : back()->withErrors(['email' => [__($status)]]);
// })->middleware('guest')->name('password.update');



Route::middleware(['auth','CheckEmailVerified'])->group(function () {
Route::get('/transaction',[TransactionController::class,'index'])->name('transaction');
Route::get('/transaction/detail/{id}',[TransactionController::class,'showDetail'])->name('transaction.detail');
Route::get('/transaction/hasil',[TransactionController::class,'showHasil'])->name('transaction.hasil');
Route::get('/transaction/create',[TransactionController::class,'create'])->name('transaction.create');
});