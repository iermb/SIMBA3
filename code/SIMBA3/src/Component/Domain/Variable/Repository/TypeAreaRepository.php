<?php


namespace SIMBA3\Component\Domain\Variable\Repository;


use SIMBA3\Component\Domain\Locale\Entity\Locale;
use SIMBA3\Component\Domain\Variable\Entity\TypeArea;

interface TypeAreaRepository
{
    public function getTypeArea(Locale $locale, int $TypeAreaId): ?TypeArea;

    public function getAllTypeArea(Locale $locale): array;
}