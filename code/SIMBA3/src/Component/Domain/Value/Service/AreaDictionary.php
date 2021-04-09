<?php


namespace SIMBA3\Component\Domain\Value\Service;


use SIMBA3\Component\Domain\Variable\Entity\Area;

class AreaDictionary implements TypeDictionary
{
    private array $areas;

    public function __construct(array $areas)
    {
        $this->areas = $areas;
    }

    public function getDictionaryValuesAsArray(): array
    {
        $typeAreaCollection =  new TypeAreaCollection($this->areas);

        return $typeAreaCollection->getAreaAsArray();
    }
}