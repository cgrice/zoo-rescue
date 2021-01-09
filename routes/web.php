<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChallengeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/level/{level}', [ChallengeController::class, 'challenge']);
Route::post('/level/{level}/solve', [ChallengeController::class, 'solve']);
Route::get('/win', function() {
    return view('win');
});

