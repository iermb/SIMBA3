<?php

namespace SIMBA3\Component\Domain\Value\Service;

use SIMBA3\Component\Domain\Variable\Entity\IndependentVariable;

class TypeIndependentVariableCollection
{
    private array $typeIndependentVariableCollection;

    public function __construct()
    {
        $this->typeIndependentVariableCollection = [];
    }

    public function addIndependentVariable(IndependentVariable $independentVariable):void
    {
        $typeIndependentVariableId = $independentVariable->getType()->getId();

        if (!isset($this->typeIndependentVariableCollection[$typeIndependentVariableId])) {
            $this->typeIndependentVariableCollection[$typeIndependentVariableId] = new TypeIndependentVariableSet($independentVariable);
            return;
        }

        $this->typeIndependentVariableCollection[$typeIndependentVariableId]->addIndependentVariable($independentVariable);
    }

    public function getIndependentVariableAsArray(): array
    {
        return array_map(
            function(TypeIndependentVariableSet $typeIndependentVariableSet){
                return $typeIndependentVariableSet->getArray();
            },
            ArrayTool::resetKeysArray($this->typeIndependentVariableCollection)
        );
    }
}