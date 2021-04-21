<?php

namespace SIMBA3\Component\Domain\Variable\Service;

use SIMBA3\Component\Domain\Variable\Entity\Month;

class MonthDictionary implements TypeDictionary
{
    private const MONTH_ID_FIELD = "monthId";
    private const MONTH_NAME_FIELD = "monthName";

    private array $months;

    public function __construct(array $months)
    {
        $this->months = $months;
    }


    public function getDictionaryValuesAsArray(): array
    {
        return array_map(array($this, "getMonthAsArray"), $this->months);
    }

    private function getMonthAsArray(Month $month): array
    {
        return [
            self::MONTH_ID_FIELD => $month->getId(),
            self::MONTH_NAME_FIELD => $month->getMonth()
        ];
    }
}