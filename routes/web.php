<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;

Route::get('/', [GameController::class,'home'])->name('home');
Route::get('/pengumpulan', [GameController::class,'pengumpulan'])->name('pengumpulan');

Route::get('/materi', [GameController::class,'materi'])->name('materi');
Route::get('/map/{id}', [GameController::class,'map'])->name('map');

Route::get('/pos/{id}', [GameController::class,'pos'])->name('pos');
Route::post('/jawab/{id}', [GameController::class,'jawab'])->name('jawab');

Route::get('/finish/{materi}', [GameController::class,'finish'])->name('finish');
Route::post('/upload-tugas', [GameController::class, 'uploadTugas']);