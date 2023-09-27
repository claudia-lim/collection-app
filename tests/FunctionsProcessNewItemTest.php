<?php

require_once '../functions-process-new-item.php';
require_once '../classes/Paints.php';

use PHPUnit\Framework\TestCase;

class FunctionsProcessNewItemTest extends TestCase {
    public function testAlreadyInCollectionReturnTrueIfInCollection() {
        $testPaintInCollection1 = new Paints;
        $testPaintInCollection1->setBrandName('Same Brand');
        $testPaintInCollection1->setColourName('Same Colour');
        $testPaintInCollection1->setNeedReplacing(0);

        $testPaintInCollection2 = new Paints;

        $testCollectionArray[] = $testPaintInCollection1;
        $testCollectionArray[] = $testPaintInCollection2;

        $testNewPaint = new Paints;
        $testNewPaint->setBrandName('Same Brand');
        $testNewPaint->setColourName('Same Colour');
        $testNewPaint->setNeedReplacing(0);

        $actual = alreadyInCollection($testCollectionArray, $testNewPaint);

        $this->assertTrue($actual);
    }

    public function testValidImageInputReturnFalseForInvalidStringInput() {
        $actual = validImageInput("Non URL String");

        $this->assertFalse($actual);
    }

    public function testValidImageInputReturnFalseForInvalidInputInteger() {
        $actual = validImageInput(1234);

        $this->assertFalse($actual);
    }

}


