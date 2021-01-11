<?php

namespace App\Codes;

class TrioCode implements Code {
    public function encode(string $plaintext): string
    {
        $plaintext = strtoupper($plaintext);
        $plaintext = str_replace(' ', '', $plaintext);

        $cipherParts = [];
        $parts = str_split($plaintext, 3);
        foreach($parts as $part) {
            if(strlen($part) > 1) {
                $first = $part[0];
                $middle = $part[1];
                $part[0] = $middle;
                $part[1] = $first;
            }

            $cipherParts[] = $part;
        }

        return implode(' ', $cipherParts);
    }
}
