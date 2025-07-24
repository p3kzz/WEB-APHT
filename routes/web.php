<?php

use App\Http\Controllers\loginController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('splash');
});


Route::middleware(['guest'])->group(function() {
    Route::get('/login', [loginController::class, 'loginForm'])->name('login');
    Route::post('/login', [loginController::class, 'login']);
});

Route::get('/dus', function () {
    return view('tenan.dataUnitUsaha');
});

Route::get('/dusi', function () {
    return view('tenan.laporanKeuangan');
});
Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/logout',[loginController::class, 'logout']);
});

require __DIR__.'/auth.php';
