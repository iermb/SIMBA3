<?php


namespace SIMBA3\Component\Domain\Variable\Repository;


use SIMBA3\Component\Domain\Variable\Entity\Area;

interface AreaRepository
{
    //ó
    //public function getAllAreaByTypeArea(TypeArea $typeArea): array;
    public function getAllAreaByTypeArea(string $locale, int $typeAreaId): array;

    public function getAreasByFilter(string $locale, array $areaUniqueIds): array;
}