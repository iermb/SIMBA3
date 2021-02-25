<?php


namespace SIMBA3\Component\Domain\Variable\Repository;


use SIMBA3\Component\Domain\Variable\Entity\Area;

interface AreaRepository
{
    public function getArea(int $areaId): ?Area;

    //ó
    //public function getAllAreaByTypeArea(TypeArea $typeArea): array;
    public function getAllAreaByTypeArea(int $typeAreaId): array;

    public function getAreasByFilter(array $areaUniqueIds): array;
}