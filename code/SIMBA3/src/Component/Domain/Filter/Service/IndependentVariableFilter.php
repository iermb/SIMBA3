<?php


namespace SIMBA3\Component\Domain\Filter\Service;

class IndependentVariableFilter implements FilterValues
{
    public const TYPE_INDEPENDENT_VARIABLE_CODE_FIELD = 'typeIndependentVariableCode';
    public const INDEPENDENT_VARIABLE_CODE_FIELD = 'independentVariableCode';

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
            self::TYPE_INDEPENDENT_VARIABLE_CODE_FIELD => $this->typeIndependentVariableCode,
            self::INDEPENDENT_VARIABLE_CODE_FIELD => $this->independentVariableCode
        ];
    }
}