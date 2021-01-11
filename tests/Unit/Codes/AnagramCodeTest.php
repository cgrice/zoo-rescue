<?php

namespace Tests\Codes;

use App\Codes\AnagramCode;
use PHPUnit\Framework\TestCase;

class AnagramCodeTest extends TestCase {
    protected function setUp(): void
    {
        srand(1000);
    }

    protected function tearDown(): void
    {
        srand();
    }

    public function testSimple() {
        $code = new AnagramCode();
        $cipher = $code->encode('ABCDEF');
        $this->assertEquals('AFCDEB', $cipher);
    }

    public function testWithSpaces() {
        $code = new AnagramCode();
        $cipher = $code->encode('CHICKEN BADGER');
        $this->assertEquals('KCHCIEN BGRADE', $cipher);
    }

    public function testWithNumbers() {
        $code = new AnagramCode();
        $cipher = $code->encode('ABC 123');
        $this->assertEquals('ACB 231', $cipher);
    }
}
