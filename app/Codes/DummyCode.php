<?php

namespace App\Codes;

class DummyCode implements Code {
    public function encode(string $plaintext): string
    {
        $alphabet = range('A', 'Z');
        $plaintext = strtoupper($plaintext);
        $words = explode(' ', $plaintext);

        $cipherParts = [];
        foreach($words as $word) {
            $middle = $alphabet[array_rand($alphabet)];
            $parts = str_split($word, ceil(strlen($word) / 2));
            $cipherParts[] = strrev($parts[0] . $middle . $parts[1]);
        }

        return implode(' ', $cipherParts);
    }
}
