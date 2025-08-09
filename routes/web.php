<?php

use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Admin\DataKeuanganContoller;
use App\Http\Controllers\Admin\DatalaporanContoller;
use App\Http\Controllers\Admin\DataMonitoringContoller;
use App\Http\Controllers\Admin\DataMonitoringController;
use App\Http\Controllers\Admin\DataPengajuanTenantController;
use App\Http\Controllers\Admin\DataProduksiContoller;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Tenant\dataLaporanController;
use App\Http\Controllers\Tenant\DataPengajuanController;
use App\Http\Controllers\Tenant\DataUsahaController;
use App\Http\Controllers\Tenant\laporanProduksiController;
use App\Http\Controllers\Tenant\laporanKeuanganController;
use App\Http\Controllers\Tenant\monitoringController;
use App\Http\Controllers\Tenant\TenantController;
use App\Http\Controllers\PdSumekar\adminPdsController;
use App\Http\Controllers\PdSumekar\pengajuanPDSController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminpdsMiddleware;
use App\Http\Controllers\TenantControllers;


Route::get('/', function () {
    return view('splash');
});

// Login
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'loginForm'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'login']);
});

// Admin
Route::middleware(['auth', 'admin_apht'])->group(function () {
    Route::resource('/admin', AdminController::class)->names('admin_apht.index');
    Route::resource('/PengajuanTenant', DataPengajuanTenantController::class)->names('admin_apht.PengajuanTenant');
    Route::resource('/dataLaporan', DatalaporanContoller::class)->names('admin_apht.dataLaporan');
    Route::resource('/dataproduksi', DataProduksiContoller::class)->names('admin_apht.dataproduksi');
    Route::resource('/datamonitoring', DataMonitoringController::class)->names('admin_apht.datamonitoring');
    Route::resource('/datakeuangan', DataKeuanganContoller::class)->names('admin_apht.datakeuangan');
    Route::get('/datauser', [RegisteredUserController::class, 'tampilkan'])->name('admin_apht.datauser.tampilkan');
    Route::resource('/register', RegisteredUserController::class)->names('auth.register');
    Route::post('/register/create', [RegisteredUserController::class, 'store'])->name('auth.register.store');
    Route::get('/edit/{id}/DataUser', [RegisteredUserController::class, 'edit_DataUser'])->name('admin_apht.datauser.edit');
    Route::post('/edit/{id}/DataUser', [RegisteredUserController::class, 'update_DataUser'])->name('admin_apht.datauser.update');
    Route::get('/hapus/{id}/DataUser', [RegisteredUserController::class, 'hapus_DataUser']);
});

// tenant

Route::middleware(['auth', 'tenant'])->group(function () {
    Route::resource('/tenant', TenantController::class)->names('tenant.index');
    Route::resource('/dataUsaha', DataUsahaController::class)->names('tenant.dataUsaha');
    Route::resource('/dataPengajuan', DataPengajuanController::class)->names('tenant.dataPengajuan');
    Route::resource('/laporanproduksi', laporanProduksiController::class)->names('tenant.laporanproduksi');
    Route::resource('/laporankeuangan', laporanKeuanganController::class)->names('tenant.laporankeuangan');
    Route::resource('/datalaporan', dataLaporanController::class)->names('tenan.datalaporan');
    Route::resource('/monitoring', monitoringController::class)->names('tenan.monitoring');
});

Route::middleware(['auth', AdminpdsMiddleware::class])->group(function () {
    Route::resource('/adminpds', pengajuanPDSController::class)->names('pdSumekar.dataPengajuan');
});



// Profile dan logout
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/logout', [AuthenticatedSessionController::class, 'destroy']);
});

require __DIR__ . '/auth.php';
