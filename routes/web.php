<?php 

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// halaman login
Route::get('/login', function () {
    return view('login');
})->name('login');

// proses login
Route::post('/login', function (Request $request) {

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect('/dashboard');
    }

    return back()->with('error', 'Email atau password salah!');
}); 

Route::get('/dashboard', function () {
    return "Selamat datang di dashboard kasir!";
})->middleware('auth'); 

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
    ]);

    return back()->with('status', 'Link pemulihan kata sandi berhasil dikirim ke email Anda.');
})->name('password.email');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

Route::get('/transaksi', function () {
    return view('transaksi');
})->middleware('auth');

Route::get('/menu', function () {
    return view('menu');
})->middleware('auth');

Route::get('/laporan', function () {
    return view('laporan');
})->middleware('auth');