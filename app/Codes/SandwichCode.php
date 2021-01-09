<?php

namespace App\Codes;

class SandwichCode implements Code {
    public function encode(string $plaintext): string {
        $plaintext = str_replace(' ', '', $plaintext);
        $index = ceil(strlen($plaintext) / 2);
        $firstHalf = substr($plaintext, 0, $index);
        $secondHalf = substr($plaintext, $index, strlen($plaintext));

        $questionArray = [];

        $i = 0;
        while($i < strlen($firstHalf) || $i < strlen($secondHalf)) {
            if (isset($firstHalf[$i])) {
                $questionArray[] = $firstHalf[$i];
            }

            if (isset( $secondHalf[$i])) {
                $questionArray[] = $secondHalf[$i];
            }

            $i++;
        }

        $question = implode('', $questionArray);
        $chunks = str_split($question, 2);
        return implode(' ', $chunks);
    }
}
