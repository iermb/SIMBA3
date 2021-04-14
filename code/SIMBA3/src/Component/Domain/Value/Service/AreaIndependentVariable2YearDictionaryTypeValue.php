<?php

namespace SIMBA3\Component\Domain\Value\Service;

use SIMBA3\Component\Application\Value\Request\ReadDictionaryVariablesRequest;

class AreaIndependentVariable2YearDictionaryTypeValue extends DictionaryTypeValue
{
    function getDictionaries(ReadDictionaryVariablesRequest $readDictionaryVariablesRequest): array
    {
        $areaIndependentVariable2YearTypeValueUniqueIds = new AreaIndependentVariable2YearTypeValueUniqueIds($readDictionaryVariablesRequest->getTypeValueArray());
        return [
            new AreaDictionary($this->areaRepository->getAreasByFilter($readDictionaryVariablesRequest->getLocale(), $areaIndependentVariable2YearTypeValueUniqueIds->getAreaUniqueCodes())),
            new IndependentVariableDictionary($this->independentVariableRepository->getIndependentVariablesByFilter($readDictionaryVariablesRequest->getLocale(), $areaIndependentVariable2YearTypeValueUniqueIds->getIndependentVariable1Codes())),
            new IndependentVariableDictionary($this->independentVariableRepository->getIndependentVariablesByFilter($readDictionaryVariablesRequest->getLocale(), $areaIndependentVariable2YearTypeValueUniqueIds->getIndependentVariable2Codes())),
            new YearDictionary($this->yearRepository->getYearsByFilter($areaIndependentVariable2YearTypeValueUniqueIds->getYearUniqueIds())),
        ];
    }
}