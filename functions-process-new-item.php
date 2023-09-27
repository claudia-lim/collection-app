<?php
function alreadyInCollection(array $paints, Paints $newPaint)
{
    foreach ($paints as $paint) {
        if ($newPaint->getBrandName() == $paint->getBrandname()
            && $newPaint->getColourName() == $paint->getColourName()
            && $newPaint->getNeedReplacing() == $paint->getNeedReplacing()) {
            return true;
        }
    }
    return false;
}

function validImageInput(string $imageFormInput)
{
    if (!$imageFormInput) {
        return true;
    } else {
        if (filter_var($imageFormInput, FILTER_VALIDATE_URL)) {
            return true;
        } else {
            return false;
        }
    }
}