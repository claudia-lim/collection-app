<?php
require_once '../classes/Colour.php';

use PHPUnit\Framework\TestCase;

class ColourTest extends TestCase{

    public function testGetColourReturnString() {
        $testColour = new Colour();
        $testColour->setColour("Test Colour Name");
        $actual = $testColour->getColour();

        $this->assertIsString($actual);
    }
}