<?php

namespace App\Codes;

class AnagramCode implements Code {
    public function encode(string $plaintext): string
    {
        $plaintext = strtoupper($plaintext);
        $parts = [];
        $words = explode(' ', $plaintext);
        foreach($words as $word) {
            $parts[] = str_shuffle($word);
        }
        $cipher = implode(' ', $parts);
        return strtoupper($cipher);
    }
}
