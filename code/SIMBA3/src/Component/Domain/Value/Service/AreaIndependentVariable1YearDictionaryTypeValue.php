<?php

namespace SIMBA3\Component\Domain\Value\Service;

use SIMBA3\Component\Application\Value\Request\ReadDictionaryVariablesRequest;

class AreaIndependentVariable1YearDictionaryTypeValue extends DictionaryTypeValue
{

    function getDictionaries(ReadDictionaryVariablesRequest $readDictionaryVariablesRequest): array
    {
        $areaIndependentVariable1YearTypeValueUniqueIds = new AreaIndependentVariable1YearTypeValueUniqueIds($readDictionaryVariablesRequest->getTypeValueArray());
        return [
            new AreaDictionary($this->areaRepository->getAreasByFilter($readDictionaryVariablesRequest->getLocale(), $areaIndependentVariable1YearTypeValueUniqueIds->getAreaUniqueCodes())),
            new IndependentVariableDictionary($this->independentVariableRepository->getIndependentVariablesByFilter($readDictionaryVariablesRequest->getLocale(), $areaIndependentVariable1YearTypeValueUniqueIds->getIndependentVariable1Codes())),
            new YearDictionary($this->yearRepository->getYearsByFilter($areaIndependentVariable1YearTypeValueUniqueIds->getYearUniqueIds())),
        ];
    }
}