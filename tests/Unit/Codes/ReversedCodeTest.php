<?php

namespace Tests\Codes;

use App\Codes\ReversedCode;
use PHPUnit\Framework\TestCase;


class ReversedCodeTest extends TestCase {
    public function testSimple() {
        $code = new ReversedCode();
        $cipher = $code->encode('ABCDEF');
        $this->assertEquals('FEDCBA', $cipher);
    }

    public function testMixedCase() {
        $code = new ReversedCode();
        $cipher = $code->encode('abCDeF');
        $this->assertEquals('FEDCBA', $cipher);
    }

    public function testWithSpaces() {
        $code = new ReversedCode();
        $cipher = $code->encode('THIS IS A TEST');
        $this->assertEquals('TSET A SI SIHT', $cipher);
    }
}
