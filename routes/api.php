<?php

use App\Http\Controllers\Api\PengajuanApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function(){
    // hendle pengajuan
    Route::prefix('pengajuan')->group(function() {
        Route::get('/', [PengajuanApiController::class, 'index']);
        Route::post('/', [PengajuanApiController::class, 'store']);
        Route::get('/{id}', [PengajuanApiController::class, 'show']);
        Route::put('/{id}', [PengajuanApiController::class, 'update']);
        Route::put('/{id}', [PengajuanApiController::class, 'destroy']);
    });
});
