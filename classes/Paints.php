<?php

class Paints
{

    private int $id;
    private string $brand_name;
    private string $colour_name;
    private int $need_replacing;
    private $image;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getBrandName(): string
    {
        return $this->brand_name;
    }

    public function setBrandName(string $brand_name): void
    {
        $this->brand_name = $brand_name;
    }

    public function getColourName(): string
    {
        return $this->colour_name;
    }

    public function setColourName(string $colour_name): void
    {
        $this->colour_name = $colour_name;
    }

    public function getNeedReplacing(): string
    {
        if ($this->need_replacing == 1) {
            return 'Yes';
        } else {
            return 'No';
        }
    }

    public function setNeedReplacing(int $need_replacing): void
    {
        $this->need_replacing = $need_replacing;
    }

    public function getImage(): string
    {
        if (!$this->image) {
            return 'No Image';
        } else {
            return $this->image;
        }
    }

    public function setImage(string $image): void
    {
        $this->image = $image;
    }

}