<?php

namespace App\Codes;

class NumberCode implements Code {
    public function encode(string $plaintext): string {
        $questionLetters = [];
        $alphabet = range('A', 'Z');
        for ($i = 0; $i < strlen($plaintext); $i++){
            $letter = $plaintext[$i];
            if ($letter === ' ') continue;
            $questionLetters[] = array_search($letter, $alphabet) + 1;
        }

        return implode(' ', $questionLetters);
    }
}
