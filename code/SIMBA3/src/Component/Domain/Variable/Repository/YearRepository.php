<?php


namespace SIMBA3\Component\Domain\Variable\Repository;


use SIMBA3\Component\Domain\Variable\Entity\Year;

interface YearRepository
{
    public function getYear(int $year): ?Year;

    public function getYearsByFilter(array $years): array;
}