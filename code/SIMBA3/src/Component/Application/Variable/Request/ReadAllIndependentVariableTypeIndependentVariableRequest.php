<?php


namespace SIMBA3\Component\Application\Variable\Request;


class ReadAllIndependentVariableTypeIndependentVariableRequest
{
    private int $typeIndependentVariableId;

    public function __construct(int $typeIndependentVariableId)
    {
        $this->typeIndependentVariableId = $typeIndependentVariableId;
    }

    public function getTypeIndependentVariableId(): int
    {
        return $this->typeIndependentVariableId;
    }
}