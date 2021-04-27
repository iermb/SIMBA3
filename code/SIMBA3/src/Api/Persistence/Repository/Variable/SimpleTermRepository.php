<?php

namespace SIMBA3\Api\Persistence\Repository\Variable;

use SIMBA3\Component\Domain\Filter\Service\MonthFilter;
use SIMBA3\Component\Domain\Filter\Service\TermFilter;
use SIMBA3\Component\Domain\Variable\Entity\Month;
use SIMBA3\Component\Domain\Variable\Repository\MonthRepository;

class SimpleTermRepository implements MonthRepository
{

    private array $termTranslations = [
        'ca' => [
            1 => '1er trimestre',
            2 => '2on trimestre',
            3 => '3er trimestre',
            4 => '4rt trimestre',
        ],

        'es' => [
            1 => '1r trimestre',
            2 => '2o trimestre',
            3 => '3o trimestre',
            4 => '4o trimestre',
        ],

        'en' => [
            1 => '1st term',
            2 => '2nd term',
            3 => '3rd term',
            4 => '4th term',
        ]
    ];

    public function getMonth(string $locale, int $month): ?Month
    {
        if (!isset($this->termTranslations[$locale][$month])) {
            return null;
        }

        return new Month($month, $this->termTranslations[$locale][$month]);
    }

    public function getMonthsByFilter(string $locale, array $months): array
    {
        return array_map(function(array $month) use ($locale): Month {
            return $this->getMonth($locale, $month[TermFilter::TERM_ID_FIELD]);
        }, $months);
    }
}