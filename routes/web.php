<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JsonUploadController;

/*
 * Auth route
 * */
Route::get('/', [AuthController::class, 'index'])->name('auth.index');
Route::middleware('guest')->group(function () {
    Route::get('auth/github/redirect', [AuthController::class, 'redirectGithub'])->name('auth.redirect');
    Route::get('/auth/github/callback', [AuthController::class, 'githubOAuth'])->name('github-oauth');
});
Route::get('auth/logout', [AuthController::class, 'logout'])->name('auth.logout')->middleware('auth');
/*
 * Json Uploader route
 * */
Route::middleware('auth')->group(function () {
    Route::get('json/index', [JsonUploadController::class, 'index'])->name('json-upload.index');
    Route::get('json/create', [JsonUploadController::class, 'create'])->name('json-upload.create');
    Route::post('json/store', [JsonUploadController::class, 'store'])->name('json-upload.store');
    Route::get('json/{json}/export',[JsonUploadController::class, 'export'])->name('json-upload.export');
    Route::get('json/{json}/download', [JsonUploadController::class, 'download'])->name('json-upload.download');
});

