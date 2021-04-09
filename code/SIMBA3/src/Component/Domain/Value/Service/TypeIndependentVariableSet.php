<?php


namespace SIMBA3\Component\Domain\Value\Service;

use SIMBA3\Component\Domain\Variable\Entity\IndependentVariable;
use SIMBA3\Component\Domain\Variable\Entity\TypeIndependentVariable;

class TypeIndependentVariableSet
{
    private const TYPE_INDEPENDENT_VARIABLE_CODE_FIELD = "code";
    private const TYPE_INDEPENDENT_VARIABLE_NAME_FIELD = "name";
    private const INDEPENDENT_VARIABLE_CODE_FIELD = "code";
    private const INDEPENDENT_VARIABLE_NAME_FIELD = "name";
    private const INDEPENDENT_VARIABLE_GROUP = "independentVariables";

    private TypeIndependentVariable $typeIndependentVariable;
    private array $independentVariableCollection;

    public function __construct(IndependentVariable $independentVariable)
    {
        $this->typeIndependentVariable = $independentVariable->getType();
        $this->independentVariableCollection = [$independentVariable];
    }

    public function addIndependentVariable(IndependentVariable $independentVariable): void
    {
        $this->independentVariableCollection[] = $independentVariable;
    }

    public function getArray(): array
    {
        $independentVariableGroup = array_map(array($this, "getIndependentVariableAsArray"), $this->independentVariableCollection);

        return [
            self::TYPE_INDEPENDENT_VARIABLE_CODE_FIELD => $this->typeIndependentVariable->getCode(),
            self::TYPE_INDEPENDENT_VARIABLE_NAME_FIELD => $this->typeIndependentVariable->getName(),
            self::INDEPENDENT_VARIABLE_GROUP => $independentVariableGroup,
        ];
    }

    private function getIndependentVariableAsArray(IndependentVariable $independentVariable):array
    {
        return [
            self::INDEPENDENT_VARIABLE_CODE_FIELD => $independentVariable->getCode(),
            self::INDEPENDENT_VARIABLE_NAME_FIELD => $independentVariable->getName(),
        ];
    }
}