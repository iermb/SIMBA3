<?php


namespace SIMBA3\Component\Domain\Filter\Service;


class IndependentVariableFilter implements FilterValues
{
    private const TYPE_INDEPENDENT_VARIABLE_ID_FIELD = "typeIndependentVariableId";
    private const INDEPENDENT_VARIABLE_ID_FIELD      = "independentVariableId";

    private int $typeIndependentVariableId;
    private int $independentVariableId;

    public function __construct(int $typeIndependentVariableId, int $independentVariableId)
    {
        $this->typeIndependentVariableId = $typeIndependentVariableId;
        $this->independentVariableId = $independentVariableId;
    }

    public function getFilterAsArray(): array
    {
        return [
            self::TYPE_INDEPENDENT_VARIABLE_ID_FIELD => $this->typeIndependentVariableId,
            self::INDEPENDENT_VARIABLE_ID_FIELD => $this->independentVariableId
        ];
    }
}