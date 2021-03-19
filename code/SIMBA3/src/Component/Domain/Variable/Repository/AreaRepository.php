<?php


namespace SIMBA3\Component\Domain\Variable\Repository;


use SIMBA3\Component\Domain\Locale\Entity\Locale;
use SIMBA3\Component\Domain\Variable\Entity\Area;

interface AreaRepository
{
    public function getArea(Locale $locale, int $areaId): ?Area;

    //ó
    //public function getAllAreaByTypeArea(TypeArea $typeArea): array;
    public function getAllAreaByTypeArea(Locale $locale, int $typeAreaId): array;

    public function getAreasByFilter(Locale $locale, array $areaUniqueIds): array;
}