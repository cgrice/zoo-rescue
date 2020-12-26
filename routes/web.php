<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\SolveController;

Route::get('/', function () {
    $challenges = SolveController::CHALLENGES;
    $level = array_rand($challenges);
    $question = SolveController::encodeQuestion($challenges[$level]['answer']);

    return view('welcome', [
        'level' => $level,
        'question' => $question
    ]);
});


Route::post('/solve', [SolveController::class, 'solve']);

