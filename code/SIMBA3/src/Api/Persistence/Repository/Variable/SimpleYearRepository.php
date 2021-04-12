<?php

namespace SIMBA3\Api\Persistence\Repository\Variable;

use SIMBA3\Component\Domain\Filter\Service\YearFilter;
use SIMBA3\Component\Domain\Variable\Entity\Year;
use SIMBA3\Component\Domain\Variable\Repository\YearRepository;

class SimpleYearRepository implements YearRepository
{
    public function getYear(int $year): Year
    {
        return new Year($year);
    }

    public function getYearsByFilter(array $years): array
    {
        return array_map(function(array $year): Year {
            return new Year($year[YearFilter::YEAR_ID_FIELD]);
        }, $years);
    }
}