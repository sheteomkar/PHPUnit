<?php

use PHPUnit\Framework\TestCase;

class MyFunctionTest extends TestCase
{
    protected $MyFunction;

    public function setUp(): void
    {
        // $this->MyFunction = new MyFunction();
        $this->assertFileExists('../src/MyFunction.php');
        require "../src/MyFunction.php";

    }

    public function testgetDate()
    {
        $term = "1 Month";
        $old_date = "2022-01-31";
        $this->assertEquals('2022-02-28 00:00:00', $this->getNewDate($term, $old_date));
        // $this->assertNull($term);
        // $this->assertNan($old_date);
    }
}
