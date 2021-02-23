<?php


namespace SIMBA3\Component\Domain\Variable\Repository;


use SIMBA3\Component\Domain\Variable\Entity\Area;
use SIMBA3\Component\Domain\Variable\Entity\TypeArea;

interface AreaRepository
{
    public function getArea(int $areaId): ?Area;

    //ó
    //public function getAllAreaByTypeArea(TypeArea $typeArea): array;
    public function getAllAreaByTypeArea(int $typeAreaId): array;
}