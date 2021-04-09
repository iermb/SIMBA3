<?php

namespace SIMBA3\Component\Domain\Value\Service;

use SIMBA3\Component\Domain\Variable\Entity\IndependentVariable;

class IndependentVariableDictionary implements TypeDictionary
{
    private array $independentVariables;
    private TypeIndependentVariableCollection $typeIndependentVariableCollection;

    public function __construct(array $independentVariables)
    {
        $this->independentVariables = $independentVariables;
    }

    public function getDictionaryValuesAsArray(): array
    {
        $this->typeIndependentVariableCollection = new TypeIndependentVariableCollection();

        array_map(function (IndependentVariable $independentVariable) {
            $this->typeIndependentVariableCollection->addIndependentVariable($independentVariable);
        },$this->independentVariables);

        return $this->typeIndependentVariableCollection->getIndependentVariableAsArray();
    }
}