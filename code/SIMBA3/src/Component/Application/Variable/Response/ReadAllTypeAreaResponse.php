<?php

namespace SIMBA3\Component\Application\Variable\Response;

use SIMBA3\Component\Domain\Variable\Entity\TypeArea;

class ReadAllTypeAreaResponse
{
    private const CODE_FIELD = "code";
    private const NAME_FIELD = "name";

    private array $typeAreaArray;

    public function __construct(array $typeAreaArray)
    {
        $this->typeAreaArray = $typeAreaArray;
    }

    public function getAllTypeArea(): array
    {
        return array_map(function(TypeArea $typeArea){
            return [
                self::CODE_FIELD => $typeArea->getCode(),
                self::NAME_FIELD => $typeArea->getName(),
            ];
        }, $this->typeAreaArray);
    }
}