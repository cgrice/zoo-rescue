<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class SolveController extends Controller
{
    const CHALLENGES = [
        1 => [
            'answer' => 'DODGYDONKEY'
        ],
        2 => [
            'answer' => 'BASHFULBADGER'
        ],
        3 => [
            'answer' => 'ROUNDRABBIT'
        ],
        4 => [
            'answer' => 'LOUDLION'
        ],
    ];

    public static function encodeQuestion(string $answer) {
        $questionLetters = [];
        $alphabet = range('A', 'Z');
        for ($i = 0; $i < strlen($answer); $i++){
            $letter = $answer[$i];
            if ($letter === ' ') continue;
            $questionLetters[] = array_search($letter, $alphabet) + 1;
        }

        return implode(' ', $questionLetters);
    }

    private function checkAnswer($level, $answer) {
        $correct = self::CHALLENGES[$level]['answer'];
        $answer = str_replace(' ', '', strtoupper($answer));
        return $correct === $answer;
    }

    public function solve(Request $request)
    {
        $level = $request->input('level');
        $answer = $request->input('solution');

        if($this->checkAnswer($level, $answer)) {
            echo "CORRECT!";
        } else {
            echo "WRONG!";
        }
    }
}
