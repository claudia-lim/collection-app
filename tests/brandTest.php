<?php
require_once '../classes/Brand.php';

use PHPUnit\Framework\TestCase;

class BrandTest extends TestCase
{
    public function testGetBrandReturnString()
    {
        $testBrand = new Brand();
        $testBrand->setBrand("Test Brand Name");
        $actual = $testBrand->getBrand();

        $this->assertIsString($actual);
    }

}