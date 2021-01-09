<?php

namespace App\Codes;

class NoVowelsCode implements Code {
    public function encode(string $plaintext): string
    {
        $plaintext = strtolower($plaintext);
        $cipher = str_replace(['a', 'e', 'i', 'o', 'u'], '', $plaintext);
        return strtoupper($cipher);
    }
}
