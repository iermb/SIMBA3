<?php


namespace SIMBA3\Component\Domain\Filter\Service;


class YearFilter implements FilterValues
{
    public const YEAR_ID_FIELD = "yearId";

    private int $year;

    public function __construct(int $year)
    {
        $this->year = $year;
    }

    public function getFilterAsArray(): array
    {
        return [
            self::YEAR_ID_FIELD => $this->year
        ];
    }
}