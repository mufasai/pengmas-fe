<?php 

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\AuthController;

Route::get('/', function () {
    if (session()->has('api_token')) {
        $role = session('user.role', 'kasir');
        return $role === 'kasir'
            ? redirect('/transaksi')
            : redirect('/dashboard');
    }
    return redirect('/login');
});

// halaman login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

use App\Http\Controllers\DashboardController;

// halaman yang diproteksi API auth
Route::middleware('api.auth')->group(function () {
    // Dapat diakses oleh Kasir dan Admin (Manual Book Hal 7)
    Route::get('/pos', [\App\Http\Controllers\TransactionController::class, 'index'])->name('pos');
    Route::get('/transaksi', [\App\Http\Controllers\TransactionController::class, 'index'])->name('transaksi');
    Route::post('/transaksi', [\App\Http\Controllers\TransactionController::class, 'store']);
    Route::get('/riwayat-transaksi', [\App\Http\Controllers\TransactionController::class, 'history'])->name('riwayat-transaksi');

    // Khusus Admin (Manual Book Hal 7 & 16)
    Route::middleware('api.auth:admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Master Data
        Route::get('/menu', [\App\Http\Controllers\MenuController::class, 'index'])->name('menu');
        Route::post('/menu', [\App\Http\Controllers\MenuController::class, 'store']);
        Route::put('/menu/{id}', [\App\Http\Controllers\MenuController::class, 'update']);
        Route::delete('/menu/{id}', [\App\Http\Controllers\MenuController::class, 'destroy']);

        Route::get('/kategori', [\App\Http\Controllers\CategoryController::class, 'index'])->name('kategori');
        Route::post('/kategori', [\App\Http\Controllers\CategoryController::class, 'store']);
        Route::put('/kategori/{id}', [\App\Http\Controllers\CategoryController::class, 'update']);
        Route::delete('/kategori/{id}', [\App\Http\Controllers\CategoryController::class, 'destroy']);

        Route::get('/stok', [\App\Http\Controllers\StockController::class, 'index'])->name('stok');
        Route::post('/stok/toggle/{id}', [\App\Http\Controllers\StockController::class, 'toggle'])->name('stok.toggle');

        // Pengaturan
        Route::get('/pengaturan/pembayaran', [\App\Http\Controllers\SettingController::class, 'payment'])->name('pengaturan.pembayaran');
        Route::post('/pengaturan/pembayaran', [\App\Http\Controllers\SettingController::class, 'updatePayment']);

        Route::get('/pengaturan/struk', [\App\Http\Controllers\SettingController::class, 'receipt'])->name('pengaturan.struk');
        Route::post('/pengaturan/struk', [\App\Http\Controllers\SettingController::class, 'updateReceipt']);

        Route::get('/pengaturan/pajak', [\App\Http\Controllers\SettingController::class, 'tax'])->name('pengaturan.pajak');
        Route::post('/pengaturan/pajak', [\App\Http\Controllers\SettingController::class, 'updateTax']);

        // Akses
        Route::get('/pengguna', [\App\Http\Controllers\UserController::class, 'index'])->name('pengguna');
        Route::post('/pengguna', [\App\Http\Controllers\UserController::class, 'store']);
        Route::put('/pengguna/{id}', [\App\Http\Controllers\UserController::class, 'update']);
        Route::delete('/pengguna/{id}', [\App\Http\Controllers\UserController::class, 'destroy']);

        Route::get('/laporan', [\App\Http\Controllers\ReportController::class, 'index'])->name('laporan');
        Route::post('/laporan/send-receipt', [\App\Http\Controllers\ReportController::class, 'sendReceipt']);
    });
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