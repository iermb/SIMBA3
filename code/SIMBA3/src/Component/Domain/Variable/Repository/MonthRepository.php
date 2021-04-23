<?php

namespace SIMBA3\Component\Domain\Variable\Repository;

use SIMBA3\Component\Domain\Variable\Entity\Month;

interface MonthRepository
{
    public function getMonth(string $locale, int $month): ?Month;

    public function getMonthsByFilter(string $locale, array $months): array;
}