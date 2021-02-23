<?php


namespace SIMBA3\Component\Domain\Filter\Service;


class YearFilter implements FilterValues
{
    private const YEAR_FIELD = "year";

    private int $year;

    public function __construct(int $year)
    {
        $this->year = $year;
    }

    public function getFilterAsArray(): array
    {
        return [
            self::YEAR_FIELD => $this->year
        ];
    }
}