<?php


namespace SIMBA3\Component\Application\VariableIndicator\Response;


use SIMBA3\Component\Domain\Variable\Entity\Year;

class ReadYearsIndicatorResponse
{
    private const YEAR_ID_FIELD = "yearId";
    private const YEAR_NAME_FIELD = "yearName";

    private array $years;

    public function __construct(array $years)
    {
        $this->years = $years;
    }

    public function getYearsIndicatorAsArray(): array
    {
        return array_map(array($this, "getYearAsArray"), $this->years);
    }

    private function getYearAsArray(Year $year): array
    {
        return [
            self::YEAR_ID_FIELD => $year->getId(),
            self::YEAR_NAME_FIELD => $year->getYear()
        ];
    }
}