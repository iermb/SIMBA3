<?php


namespace SIMBA3\Component\Domain\Value\Service;


use SIMBA3\Component\Domain\Variable\Entity\Area;

class AreaDictionary implements TypeDictionary
{
    private array $areas;
    private TypeAreaCollection $typeAreaCollection;

    public function __construct(array $areas)
    {
        $this->areas = $areas;
    }

    public function getDictionaryValuesAsArray(): array
    {
        $this->typeAreaCollection =  new TypeAreaCollection();

        array_map(function (Area $area) {
            $this->typeAreaCollection->addArea($area);
        },$this->areas);

        return  $this->typeAreaCollection->getAreaAsArray();
    }
}