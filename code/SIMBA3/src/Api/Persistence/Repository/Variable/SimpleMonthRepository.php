<?php

namespace SIMBA3\Api\Persistence\Repository\Variable;

use SIMBA3\Component\Domain\Filter\Service\MonthFilter;
use SIMBA3\Component\Domain\Variable\Entity\Month;
use SIMBA3\Component\Domain\Variable\Repository\MonthRepository;

class SimpleMonthRepository implements MonthRepository
{

    private array $monthTranslations = [
        'ca' => [
            1 => 'Gener',
            2 => 'Febrer',
            3 => 'Març',
            4 => 'Abril',
            5 => 'Maig',
            6 => 'Juny',
            7 => 'Juliol',
            8 => 'Agost',
            9 => 'Setembre',
            10 => 'Octubre',
            11 => 'Novembre',
            12 => 'Decembre',
        ],

        'es' => [
            1 => 'Enero',
            2 => 'Febrero',
            3 => 'Marzo',
            4 => 'Abril',
            5 => 'Mayo',
            6 => 'Junio',
            7 => 'Julio',
            8 => 'Agosto',
            9 => 'Septiembre',
            10 => 'Octubre',
            11 => 'Noviembre',
            12 => 'Diciembre',
        ],

        'en' => [
            1 => 'January',
            2 => 'February',
            3 => 'March',
            4 => 'April',
            5 => 'May',
            6 => 'June',
            7 => 'July',
            8 => 'August',
            9 => 'September',
            10 => 'October',
            11 => 'November',
            12 => 'December',
        ]
    ];

    public function getMonth(string $locale, int $month): ?Month
    {
        if (!isset($this->monthTranslations[$locale][$month])) {
            return null;
        }

        return new Month($month, $this->monthTranslations[$locale][$month]);
    }

    public function getMonthsByFilter(string $locale, array $months): array
    {
        return array_map(function(array $month) use ($locale): Month {
            return $this->getMonth($locale, $month[MonthFilter::MONTH_ID_FIELD]);
        }, $months);
    }
}