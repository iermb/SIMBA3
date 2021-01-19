<?php


namespace SIMBA3\Component\Domain\Area\Repository;


use SIMBA3\Component\Domain\Area\Entity\Area;
use SIMBA3\Component\Domain\Area\Entity\TypeArea;

interface AreaRepository
{
    public function getArea(int $areaId): ?Area;

    //ó
    //public function getAllAreaByTypeArea(TypeArea $typeArea): array;
    public function getAllAreaByTypeArea(int $typeAreaId): array;
}