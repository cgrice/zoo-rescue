<?php

namespace Tests\Codes;

use PHPUnit\Framework\TestCase;
use App\Codes\DummyCode;

class DummyCodeTest extends TestCase {
    protected function setUp(): void
    {
        srand(1000);
    }

    protected function tearDown(): void
    {
        srand();
    }

    public function testSimple() {
        $code = new DummyCode();
        $cipher = $code->encode('THEY');
        $this->assertEquals('YEHHT', $cipher);
    }

    public function testMixedCase() {
        $code = new DummyCode();
        $cipher = $code->encode('tHeY');
        $this->assertEquals('YEHHT', $cipher);
    }

    public function testWithSpaces() {
        $code = new DummyCode();
        $cipher = $code->encode('THEY ARE');
        $this->assertEquals('YEHHT EFRA', $cipher);
    }
}
