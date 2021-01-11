<?php

namespace Tests\Codes;

use App\Codes\SandwichCode;
use PHPUnit\Framework\TestCase;


class SandwichCodeTest extends TestCase {
    public function testSimple() {
        $code = new SandwichCode();
        $cipher = $code->encode('ABCDEF');
        $this->assertEquals('AD BE CF', $cipher);
    }

    public function testMixedCase() {
        $code = new SandwichCode();
        $cipher = $code->encode('abCDeF');
        $this->assertEquals('AD BE CF', $cipher);
    }

    public function testWithSpaces() {
        $code = new SandwichCode();
        $cipher = $code->encode('THIS IS A TEST');
        $this->assertEquals('TA HT IE SS IT S', $cipher);
    }
}
