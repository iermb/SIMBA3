<?php

namespace SIMBA3\Component\Domain\Value\Service;

use SIMBA3\Component\Application\Value\Request\ReadDictionaryVariablesRequest;

class AreaYearDictionaryTypeValue extends DictionaryTypeValue
{
    function getDictionaries(ReadDictionaryVariablesRequest $readDictionaryVariablesRequest): array
    {
        $areaYearTypeValueUniqueIds = new AreaYearTypeValueUniqueIds($readDictionaryVariablesRequest->getTypeValueArray());
        return [
            new AreaDictionary($this->areaRepository->getAreasByFilter($readDictionaryVariablesRequest->getLocale(), $areaYearTypeValueUniqueIds->getAreaUniqueIds())),
            new YearDictionary($this->yearRepository->getYearsByFilter($areaYearTypeValueUniqueIds->getYearUniqueIds()))
        ];
    }
}