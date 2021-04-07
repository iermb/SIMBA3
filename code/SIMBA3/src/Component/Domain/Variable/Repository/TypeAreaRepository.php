<?php


namespace SIMBA3\Component\Domain\Variable\Repository;


use SIMBA3\Component\Domain\Variable\Entity\TypeArea;

interface TypeAreaRepository
{
    public function getTypeArea(string $locale, int $typeAreaId): ?TypeArea;

    public function getAllTypeArea(string $locale): array;
}