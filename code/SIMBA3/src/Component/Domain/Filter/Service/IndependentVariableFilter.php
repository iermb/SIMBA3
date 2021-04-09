<?php


namespace SIMBA3\Component\Domain\Filter\Service;


use SIMBA3\Component\Domain\Variable\Entity\IndependentVariable;
use SIMBA3\Component\Domain\Variable\Entity\TypeIndependentVariable;

class IndependentVariableFilter implements FilterValues
{
    private int $typeIndependentVariableCode;
    private int $independentVariableCode;

    public function __construct(int $typeIndependentVariableCode, int $independentVariableCode)
    {
        $this->typeIndependentVariableCode = $typeIndependentVariableCode;
        $this->independentVariableCode = $independentVariableCode;
    }

    public function getFilterAsArray(): array
    {
        return [
            TypeIndependentVariable::TYPE_INDEPENDENT_VARIABLE_CODE_FIELD => $this->typeIndependentVariableCode,
            IndependentVariable::INDEPENDENT_VARIABLE_CODE_FIELD => $this->independentVariableCode
        ];
    }
}