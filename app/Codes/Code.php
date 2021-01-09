<?php

namespace App\Codes;

interface Code {
    public function encode(string $plaintext): string;
}
