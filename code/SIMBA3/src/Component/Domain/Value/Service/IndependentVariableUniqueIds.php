<?php

namespace SIMBA3\Component\Domain\Value\Service;

use SIMBA3\Component\Domain\Filter\Service\IndependentVariableFilter;

class IndependentVariableUniqueIds
{
    private array $independentVariableArray;

    public function __construct(array $independentVariableArray)
    {
        $this->independentVariableArray = $independentVariableArray;
    }

    public function getUniqueIds(): array
    {
        return ArrayTool::uniqueAssociativeArray(array_map(array($this, "getIndependentVariableCode"), $this->independentVariableArray));
    }

    private function getIndependentVariableCode(FactIndependentVariable $value): array
    {
        return [
            IndependentVariableFilter::TYPE_INDEPENDENT_VARIABLE_CODE_FIELD => $value->getTypeId(),
            IndependentVariableFilter::INDEPENDENT_VARIABLE_CODE_FIELD => $value->getId()
        ];
    }
}