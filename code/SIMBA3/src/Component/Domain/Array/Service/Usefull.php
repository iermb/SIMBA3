<?php

namespace SIMBA3\Component\Domain\Array\Service;

class Usefull
{
    public static function uniqueAssociativeArray(array $input): array
    {
        return array_map("unserialize", array_unique(array_map("serialize", $input)));
    }
}