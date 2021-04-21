<?php

namespace SIMBA3\Component\Domain\Variable\Service;

use SIMBA3\Component\Domain\Variable\Entity\IndependentVariable;

class TypeIndependentVariableCollection
{
    private array $typeIndependentVariableCollection;

    public function __construct(array $independentVariables)
    {
        $this->typeIndependentVariableCollection = [];

        array_map(function (IndependentVariable $independentVariable) {
            $this->addIndependentVariable($independentVariable);
        },$independentVariables);
    }

    private function addIndependentVariable(IndependentVariable $independentVariable):void
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
            array_values($this->typeIndependentVariableCollection)
        );
    }
}