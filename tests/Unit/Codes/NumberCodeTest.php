<?php

namespace Tests\Codes;

use App\Codes\NumberCode;
use PHPUnit\Framework\TestCase;


class NumberCodeTest extends TestCase {
    public function testSimple() {
        $code = new NumberCode();
        $cipher = $code->encode('ABCDEF');
        $this->assertEquals('1 2 3 4 5 6', $cipher);
    }

    public function testMixedCase() {
        $code = new NumberCode();
        $cipher = $code->encode('abCDeF');
        $this->assertEquals('1 2 3 4 5 6', $cipher);
    }

    public function testWithSpaces() {
        $code = new NumberCode();
        $cipher = $code->encode('ABC XYZ');
        $this->assertEquals('1 2 3 24 25 26', $cipher);
    }

    public function testWithNumbers() {
        $code = new NumberCode();
        $cipher = $code->encode('ABC 123');
        $this->assertEquals('1 2 3 1 2 3', $cipher);
    }
}
