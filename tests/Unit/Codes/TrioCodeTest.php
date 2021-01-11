<?php

namespace Tests\Codes;

use App\Codes\TrioCode;
use PHPUnit\Framework\TestCase;


class TrioCodeTest extends TestCase {
    public function testSimple() {
        $code = new TrioCode();
        $cipher = $code->encode('ABCDEF');
        $this->assertEquals('BAC EDF', $cipher);
    }

    public function testIndivisbleByThree() {
        $code = new TrioCode();
        $cipher = $code->encode('ABCDEFG');
        $this->assertEquals('BAC EDF G', $cipher);
    }

    public function testWithSpaces() {
        $code = new TrioCode();
        $cipher = $code->encode('CHICKEN BADGER');
        $this->assertEquals('HCI KCE BNA GDE R', $cipher);
    }
}
