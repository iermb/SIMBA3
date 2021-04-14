<?php

namespace SIMBA3\Component\Domain\Value\Service;

use SIMBA3\Component\Application\Value\Request\ReadDictionaryVariablesRequest;

class YearDictionaryTypeValue extends DictionaryTypeValue
{

    function getDictionaries(ReadDictionaryVariablesRequest $readDictionaryVariablesRequest): array
    {
        $yearTypeValueUniqueIds = new YearTypeValueUniqueIds($readDictionaryVariablesRequest->getTypeValueArray());
        return [new YearDictionary($this->yearRepository->getYearsByFilter($yearTypeValueUniqueIds->getYearUniqueIds()))];

    }
}