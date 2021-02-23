<?php


namespace SIMBA3\Component\Domain\Variable\Repository;


use SIMBA3\Component\Domain\Variable\Entity\TypeArea;

interface TypeAreaRepository
{
    public function getTypeArea(int $TypeAreaId): ?TypeArea;

    public function getAllTypeArea(): array;
}