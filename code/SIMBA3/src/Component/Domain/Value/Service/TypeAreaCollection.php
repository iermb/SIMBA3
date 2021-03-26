<?php


namespace SIMBA3\Component\Domain\Value\Service;


use SIMBA3\Component\Domain\Variable\Entity\Area;

class TypeAreaCollection
{
    private array $typeAreaCollection;

    public function __construct()
    {
        $this->typeAreaCollection = [];
    }

    public function addArea(Area $area):void
    {
        $typeAreaId = $area->getType()->getId();

        if (!isset($this->typeAreaCollection[$typeAreaId])) {
            $this->typeAreaCollection[$typeAreaId] = new TypeAreaSet($area);
            return;
        }

        $this->typeAreaCollection[$typeAreaId]->addArea($area);
    }

    public function getAreaAsArray(): array
    {
        return array_map(
            function(TypeAreaSet $typeAreaSet){
                return $typeAreaSet->getArray();
            },
            ArrayTool::resetKeysArray($this->typeAreaCollection)
        );
    }
}