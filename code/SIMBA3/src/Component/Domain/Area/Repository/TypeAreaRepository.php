<?php


namespace SIMBA3\Component\Domain\Area\Repository;


use SIMBA3\Component\Domain\Area\Entity\TypeArea;

interface TypeAreaRepository
{
    public function getTypeArea(int $TypeAreaId): ?TypeArea;

    public function getAllTypeArea(): array;
}