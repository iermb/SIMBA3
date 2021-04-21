<?php


namespace SIMBA3\Component\Domain\Filter\Service;


class MonthFilter implements FilterValues
{
    public const MONTH_ID_FIELD = "monthId";

    private int $month;

    public function __construct(int $month)
    {
        $this->month = $month;
    }

    public function getFilterAsArray(): array
    {
        return [
            self::MONTH_ID_FIELD => $this->month
        ];
    }
}