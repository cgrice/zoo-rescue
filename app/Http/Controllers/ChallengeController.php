<?php

namespace App\Http\Controllers;

use App\Codes\AnagramCode;
use Illuminate\Http\Request;
use App\Codes\Code;
use App\Codes\DummyCode;
use App\Codes\NoVowelsCode;
use App\Codes\NumberCode;
use App\Codes\ReversedCode;
use App\Codes\SandwichCode;
use App\Codes\TrioCode;

class ChallengeController extends Controller
{
    const CODES = [
        'numbers' => NumberCode::class,
    ];

    const LEVELS = [
        1 => [
            'id' => '48a7f784-22bd-44c3-8b93-f8474924110f',
            'code' => ReversedCode::class,
            'cssClass' => '',
            'challenges' => [
                1 => [
                    'answer' => 'HELLO EMILY'
                ],
                // 2 => [
                //     'answer' => 'THE MONEY IS IN THE FRIDGE'
                // ],
                // 3 => [
                //     'answer' => 'THE AGENT IS IN THE TOWN SQUARE'
                // ],
                // 4 => [
                //     'answer' => 'TEAM NAME IS KIWI'
                // ]
            ]
        ],
        2 => [
            'id' => 'dca69c0d-0e9e-4ca7-b355-fa3cbad5b733',
            'code' => NumberCode::class,
            'cssClass' => 'reversed',
            'challenges' => [
                1 => [
                    'answer' => 'HELLO EMILY'
                ],
                // 2 => [
                //     'answer' => 'THE MEETING PLACE IS THE WEST DOCKS'
                // ],
                // 3 => [
                //     'answer' => 'FOLLOW WOMAN IN HAT'
                // ],
                // 4 => [
                //     'answer' => 'A MEETING AT MIDNIGHT ON WEDNESDAY'
                // ]
            ]
        ],
        3 => [
            'id' => 'cd767303-93b3-456d-bc64-272b9e18359c',
            'code' => SandwichCode::class,
            'cssClass' => '',
            'challenges' => [
                1 => [
                    'answer' => 'HELLO EMILY'
                ],
                // 2 => [
                //     'answer' => 'PENGUIN BUTLER IS CAPTURED'
                // ],
                // 3 => [
                //     'answer' => 'ENEMY SPIES ARE IN THE AREA'
                // ],
                // 4 => [
                //     'answer' => 'MEET ME AT THE BANK BECAUSE I FOUND THE MONEY'
                // ]
            ]
        ],
        4 => [
            'id' => '4fe285cb-37fa-4366-82ca-4de48ad690e2',
            'code' => TrioCode::class,
            'cssClass' => '',
            'challenges' => [
                1 => [
                    'answer' => 'HELLO EMILY'
                ],
            ],
        ],
        5 => [
            'id' => '99c6ed1c-f5d1-4bbe-b3bc-7596274becf7',
            'code' => AnagramCode::class,
            'cssClass' => '',
            'challenges' => [
                1 => [
                    'answer' => 'HELLO EMILY'
                ],
            ],
        ],
        6 => [
            'id' => '00c78a23-5187-44c0-9591-915c387585bd',
            'code' => DummyCode::class,
            'cssClass' => '',
            'challenges' => [
                1 => [
                    // 'answer' => 'FLUSH THE TOILET THREE TIMES TO OPEN THE SECRET PASSAGEWAY TO MY HQ'
                    'answer' => 'HELLO EMILY',
                ],
            ],
        ],
    ];

    const SUCCESS_MESSAGES = [
        'CODE ACCEPTED',
        'CIPHER CORRECT',
        'AUTHORISATION: SUCCESS',
        'ENTRY CODE POSITIVE',
        'CORRECT. LOGGING INTO SYSTEM.'
    ];

    const FAILURE_MESSAGES = [
        'INCORRECT. ALERTING SYSTEMS.',
        'ERROR: CODE REJECTED',
        'UNAUTHORISED ACCESS ATTEMPT',
        'ERROR: BAD CIPHER',
    ];

    public function challenge(Request $request, int $level) {
        $gameLevel = self::LEVELS[$level];
        $code = $gameLevel['code'];
        $code = new $code();
        $challenge = array_rand($gameLevel['challenges']);
        $answer = $gameLevel['challenges'][$challenge]['answer'];
        $question = $this->encodeQuestion($code, $answer);
        $cssClass = $gameLevel['cssClass'];

        return view('level', [
            'cssClass' => $cssClass,
            'level' => $level,
            'challenge' => $challenge,
            'question' => $question
        ]);
    }

    public function encodeQuestion(Code $code, string $answer) {
        return $code->encode($answer);
    }

    private function checkAnswer($level, $challenge, $solution) {
        $answer = self::LEVELS[$level]['challenges'][$challenge]['answer'];
        $answer = str_replace(' ', '', $answer);
        $solution = str_replace(' ', '', $solution);
        $solution = strtoupper($solution);
        return $answer === $solution;
    }

    public function solve(Request $request)
    {
        $level = $request->input('level');
        $challenge = $request->input('challenge');
        $answer = $request->input('solution');

        $code = self::LEVELS[$level]['code'];
        $code = new $code();

        if($this->checkAnswer($level, $challenge, $answer)) {
            if($level >= count(self::LEVELS)) {
                return redirect('/win');
            }

            $success_message = self::SUCCESS_MESSAGES[array_rand(self::SUCCESS_MESSAGES)];
            $request->session()->flash('message', $success_message);
            $request->session()->flash('result', true);
            $request->session()->flash('alert-class', 'success');
            return redirect()->action([ChallengeController::class, 'challenge'], ['level' => $level + 1]);
        } else {
            $error_message = self::FAILURE_MESSAGES[array_rand(self::FAILURE_MESSAGES)];
            $request->session()->flash('message', $error_message);
            $request->session()->flash('result', false);
            $request->session()->flash('alert-class', 'error');
            return redirect()->action([ChallengeController::class, 'challenge'], ['level' => $level]);
        }
    }
}
