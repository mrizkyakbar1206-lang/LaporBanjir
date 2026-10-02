<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;

Route::get('/form', [DataController::class, 'form']);
Route::post('/submit', [DataController::class, 'submit']);

Route::get('/', function () {
    return view('welcome');
});

