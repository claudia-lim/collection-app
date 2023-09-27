<?php

class Colour
{
    private string $colour_name;
    public function getColour(): string
    {
        return $this->colour_name;
    }

    public function setColour(string $colour_name): void
    {
        $this->colour_name = $colour_name;
    }
}