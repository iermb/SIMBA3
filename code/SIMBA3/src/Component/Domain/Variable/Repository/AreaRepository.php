<?php


namespace SIMBA3\Component\Domain\Variable\Repository;

interface AreaRepository
{
    public function getAllAreaByTypeArea(string $locale, int $typeAreaId): array;

    public function getAreasByFilter(string $locale, array $filters): array;
}