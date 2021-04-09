<?php


namespace SIMBA3\Component\Domain\Value\Service;


use SIMBA3\Component\Domain\Variable\Entity\IndependentVariable;

class IndependentVariableDictionary implements TypeDictionary
{
    private const TYPE_INDEPENDENT_VARIABLE_CODE_FIELD = "typeIndependentVariableCode";
    private const INDEPENDENT_VARIABLE_CODE_FIELD = "independentVariableCode";
    private const TYPE_INDEPENDENT_VARIABLE_NAME_FIELD = "typeIndependentVariableName";
    private const INDEPENDENT_VARIABLE_NAME_FIELD = "independentVariableName";

    private array $independentVariables;

    public function __construct(array $independentVariables)
    {
        $this->independentVariables = $independentVariables;
    }


    public function getDictionaryValuesAsArray(): array
    {
        return array_map(array($this, "getIndependentVariableAsArray"), $this->independentVariables);
    }

    private function getIndependentVariableAsArray(IndependentVariable $independentVariable): array
    {
        return [
            self::TYPE_INDEPENDENT_VARIABLE_CODE_FIELD => $independentVariable->getType()->getCode(),
            self::INDEPENDENT_VARIABLE_CODE_FIELD => $independentVariable->getCode(),
            self::TYPE_INDEPENDENT_VARIABLE_NAME_FIELD => $independentVariable->getType()->getName(),
            self::INDEPENDENT_VARIABLE_NAME_FIELD => $independentVariable->getName()
        ];
    }
}