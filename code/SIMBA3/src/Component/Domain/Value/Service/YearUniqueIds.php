<?php

namespace SIMBA3\Component\Domain\Value\Service;

use SIMBA3\Component\Domain\Filter\Service\YearFilter;

class YearUniqueIds
{
    private array $yearArray;

    public function __construct(array $yearArray)
    {
        $this->yearArray = $yearArray;
    }

    public function getUniqueIds(): array
    {
        return ArrayTool::uniqueAssociativeArray(array_map(array($this, "getYearsId"), $this->yearArray));
    }

    private function getYearsId(FactYear $value): array
    {
        return [YearFilter::YEAR_ID_FIELD => $value->getYear()];
    }
}