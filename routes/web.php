<?php

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function (){
    return view('home');
})->name('home');
Route::get('/getlist/{modalidad}', [ApiController::class, 'getList'])->name('Contents.getlist');
Route::get('/getmails', [ApiController::class, 'getMails'])->name('Contents.getmails');
Route::get('/linkshort', [ApiController::class, 'linkShort'])->name('Contents.linkshort');
