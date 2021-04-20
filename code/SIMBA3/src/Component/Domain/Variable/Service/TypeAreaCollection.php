<?php


namespace SIMBA3\Component\Domain\Variable\Service;


use SIMBA3\Component\Domain\Variable\Entity\Area;

class TypeAreaCollection
{
    private array $typeAreaCollection;

    public function __construct(array $areas)
    {
        $this->typeAreaCollection = [];

        array_map(function (Area $area) {
            $this->addArea($area);
        },$areas);
    }

    private function addArea(Area $area):void
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
            array_merge($this->typeAreaCollection, [])
        );
    }
}