<?php

namespace SIMBA3\Component\Domain\Variable\Repository;

use SIMBA3\Component\Domain\Variable\Entity\Month;

interface TermRepository
{
    public function getTerm(string $locale, int $month): ?Month;

    public function getTermsByFilter(string $locale, array $months): array;
}