<?php

namespace SIMBA3\Component\Domain\Value\Service;

use SIMBA3\Component\Application\Value\Request\ReadDictionaryVariablesRequest;
use SIMBA3\Component\Domain\Variable\Repository\AreaRepository;
use SIMBA3\Component\Domain\Variable\Repository\IndependentVariableRepository;
use SIMBA3\Component\Domain\Variable\Repository\YearRepository;

abstract class DictionaryTypeValue
{
    protected AreaRepository $areaRepository;
    protected YearRepository $yearRepository;
    protected IndependentVariableRepository $independentVariableRepository;

    public function __constructor(
        AreaRepository $areaRepository,
        YearRepository $yearRepository,
        IndependentVariableRepository $independentVariableRepository
    ){
        $this->areaRepository = $areaRepository;
        $this->yearRepository = $yearRepository;
        $this->independentVariableRepository = $independentVariableRepository;
    }

    abstract function getDictionaries(ReadDictionaryVariablesRequest $readDictionaryVariablesRequest): array;
}