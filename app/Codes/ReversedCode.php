<?php

namespace App\Codes;

class ReversedCode implements Code {
    public function encode(string $plaintext): string {
        return strrev($plaintext);
    }
}
