<?php

namespace App\Codes;

class NumberCode implements Code {
    public function encode(string $plaintext): string {
        $plaintext = strtoupper($plaintext);

        $questionLetters = [];
        $alphabet = range('A', 'Z');
        for ($i = 0; $i < strlen($plaintext); $i++){
            $letter = $plaintext[$i];
            if ($letter === ' ') continue;
            if(in_array($letter, $alphabet)) {
                $questionLetters[] = array_search($letter, $alphabet) + 1;
            } else {
                $questionLetters[] = $letter;
            }

        }

        return implode(' ', $questionLetters);
    }
}
