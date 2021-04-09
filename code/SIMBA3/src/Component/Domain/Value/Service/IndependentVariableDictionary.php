<?php

namespace SIMBA3\Component\Domain\Value\Service;

class IndependentVariableDictionary implements TypeDictionary
{
    private array $independentVariables;

    public function __construct(array $independentVariables)
    {
        $this->independentVariables = $independentVariables;
    }

    public function getDictionaryValuesAsArray(): array
    {
        $typeIndependentVariableCollection = new TypeIndependentVariableCollection($this->independentVariables);

        return $typeIndependentVariableCollection->getIndependentVariableAsArray();
    }
}