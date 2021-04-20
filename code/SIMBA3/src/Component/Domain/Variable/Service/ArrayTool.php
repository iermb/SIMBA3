<?php

namespace SIMBA3\Component\Domain\Variable\Service;

class ArrayTool
{
    public static function uniqueAssociativeArray(array $input): array
    {
        return self::resetKeysArray(array_map("unserialize", array_unique(array_map("serialize", $input))));
    }

    public static function resetKeysArray(array $input): array
    {
        return array_merge($input, []);
    }
}