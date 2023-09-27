<?php

class Colour
{
    private string $colour_name;
    private int $colour_id;
    public function getColour(): string
    {
        return $this->colour_name;
    }

    public function setColour(string $colour_name): void
    {
        $this->colour_name = $colour_name;
    }

    public function getColourId(): int
    {
        return $this->colour_id;
    }


}