<?php

namespace Tests\Codes;

use App\Codes\NoVowelsCode;
use PHPUnit\Framework\TestCase;


class NoVowelsCodeTest extends TestCase {
    public function testSimple() {
        $code = new NoVowelsCode();
        $cipher = $code->encode('ABCDEF');
        $this->assertEquals('BCDF', $cipher);
    }

    public function testMixedCase() {
        $code = new NoVowelsCode();
        $cipher = $code->encode('abCDeF');
        $this->assertEquals('BCDF', $cipher);
    }

    public function testWithSpaces() {
        $code = new NoVowelsCode();
        $cipher = $code->encode('ABC UVW');
        $this->assertEquals('BC VW', $cipher);
    }

    public function testWithNumbers() {
        $code = new NoVowelsCode();
        $cipher = $code->encode('ABC 123');
        $this->assertEquals('BC 123', $cipher);
    }
}
