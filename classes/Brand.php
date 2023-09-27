<?php

class Brand
{
    private string $brand_name;
    private int $brand_id;

    public function getBrand(): string
    {
        return $this->brand_name;
    }

    public function setBrand(string $brand_name): void
    {
        $this->brand_name = $brand_name;
    }

    public function getBrandId(): int
    {
        return $this->brand_id;
    }

}