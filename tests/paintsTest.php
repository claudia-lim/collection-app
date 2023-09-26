<?php
require_once '../classes/paints.php';

use PHPUnit\Framework\TestCase;

class PaintsTest extends TestCase
{
    public function testPaintsGetIdReturnInt()
    {
        $testPaint = new paints();
        $testPaint->setId(1);
        $actual = $testPaint->getId();

        $this->assertIsInt($actual);
    }

    public function testPaintsGetBrandNameReturnString()
    {
        $testPaint = new paints();
        $testPaint->setBrandName('Test Brand');
        $actual = $testPaint->getBrandName();

        $this->assertIsString($actual);
    }

    public function testPaintsGetColourNameReturnsString()
    {
        $testPaint = new paints();
        $testPaint->setColourName('Test Colour');
        $actual = $testPaint->getColourName();

        $this->assertIsString($actual);
    }

    public function testPaintsGetNeedReplacingReturnString()
    {
        $testPaint = new Paints();
        $testPaint->setNeedReplacing(1);
        $actual = $testPaint->getNeedReplacing();

        $this->assertIsString($actual);
    }

    public function testPaintsGetNeedReplacing1ReturnYes()
    {
        $testPaint = new Paints ();
        $testPaint->setNeedReplacing(1);
        $actual = $testPaint->getNeedReplacing();
        $expected = 'Yes';

        $this->assertEquals($actual, $expected);
    }

    public function testPaintsGetNeedReplacingReturnNo()
    {
        $testPaint = new Paints ();
        $testPaint->setNeedReplacing(0);
        $actual = $testPaint->getNeedReplacing();
        $expected = 'No';

        $this->assertEquals($actual, $expected);
    }

    public function testPaintsGetImageNullReturnNoImage()
    {
        $testPaint = new Paints ();
        $testPaint->setImage('');
        $actual = $testPaint->getImage();
        $expected = 'No Image';

        $this->assertEquals($actual, $expected);
    }
}