<?php 

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return session()->has('api_token')
        ? redirect('/dashboard')
        : redirect('/login');
});

// halaman login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

use App\Http\Controllers\DashboardController;

// halaman yang diproteksi API auth
Route::middleware('api.auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::get('/transaksi', [\App\Http\Controllers\TransactionController::class, 'index']);
    Route::post('/transaksi', [\App\Http\Controllers\TransactionController::class, 'store']);

    Route::get('/menu', [\App\Http\Controllers\MenuController::class, 'index']);
    Route::post('/menu', [\App\Http\Controllers\MenuController::class, 'store']);
    Route::put('/menu/{id}', [\App\Http\Controllers\MenuController::class, 'update']);
    Route::delete('/menu/{id}', [\App\Http\Controllers\MenuController::class, 'destroy']);

    Route::get('/laporan', [\App\Http\Controllers\ReportController::class, 'index']);
    Route::post('/laporan/send-receipt', [\App\Http\Controllers\ReportController::class, 'sendReceipt']);
});

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
    ]);

    return back()->with('status', 'Link pemulihan kata sandi berhasil dikirim ke email Anda.');
})->name('password.email');