<?php


namespace SIMBA3\Component\Domain\Value\Service;


use SIMBA3\Component\Domain\Variable\Entity\IndependentVariable;

class IndependentVariableDictionary implements TypeDictionary
{
    private const TYPE_INDEPENDENT_VARIABLE_ID_FIELD = "typeIndependentVariableId";
    private const INDEPENDENT_VARIABLE_ID_FIELD = "independentVariableId";
    private const TYPE_INDEPENDENT_VARIABLE_NAME_FIELD = "typeIndependentVariableName";
    private const INDEPENDENT_VARIABLE_NAME_FIELD = "independentVariableName";

    private array $independentVariable;

    public function __construct(array $independentVariable)
    {
        $this->independentVariable = $independentVariable;
    }


    public function getDictionaryValuesAsArray(): array
    {
        return array_map(array($this, "getIndependentVariableAsArray"), $this->independentVariable);
    }

    private function getIndependentVariableAsArray(IndependentVariable $independentVariable): array
    {
        return [
            self::TYPE_INDEPENDENT_VARIABLE_ID_FIELD => $independentVariable->getType()->getId(),
            self::INDEPENDENT_VARIABLE_ID_FIELD => $independentVariable->getId(),
            self::TYPE_INDEPENDENT_VARIABLE_NAME_FIELD => $independentVariable->getType()->getName(),
            self::INDEPENDENT_VARIABLE_NAME_FIELD => $independentVariable->getName()
        ];
    }
}