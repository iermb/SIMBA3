<?php


namespace SIMBA3\Component\Domain\Variable\Service;


use SIMBA3\Component\Domain\Indicator\Entity\TypeIndicator;
use SIMBA3\Component\Domain\Value\Service\AreaDictionary;
use SIMBA3\Component\Domain\Value\Service\AreaUniqueIds;
use SIMBA3\Component\Domain\Value\Service\CollectionVariables;
use SIMBA3\Component\Domain\Value\Service\IndependentVariableDictionary;
use SIMBA3\Component\Domain\Value\Service\YearDictionary;
use SIMBA3\Component\Domain\Variable\Repository\AreaRepository;
use SIMBA3\Component\Domain\Variable\Repository\IndependentVariableRepository;
use SIMBA3\Component\Domain\Variable\Repository\YearRepository;
use SIMBA3\Component\Domain\Value\Service\YearUniqueIds;
use SIMBA3\Component\Domain\Value\Service\IndependentVariableUniqueIds;

class CreateDictionariesByTypeIndicator
{
    private AreaRepository $areaRepository;
    private YearRepository $yearRepository;
    private IndependentVariableRepository $independentVariableRepository;

    public function __construct(
        AreaRepository $areaRepository,
        YearRepository $yearRepository,
        IndependentVariableRepository $independentVariableRepository
    ){
        $this->areaRepository = $areaRepository;
        $this->yearRepository = $yearRepository;
        $this->independentVariableRepository = $independentVariableRepository;
    }

    public function getDictionaries(string $locale, TypeIndicator $typeIndicator, CollectionVariables $values): array
    {
        $dictionaries = array();

        if ($typeIndicator->getHasArea()) {
            $areasUniquesIds = new AreaUniqueIds($values->getAreas());
            $dictionaries[] = new AreaDictionary($this->areaRepository->getAreasByFilter($locale, $areasUniquesIds->getUniqueIds()));
        }

        if ($typeIndicator->getHasYear()) {
            $areasUniquesIds = new YearUniqueIds($values->getYears());
            $dictionaries[] = new YearDictionary($this->yearRepository->getYearsByFilter($areasUniquesIds->getUniqueIds()));
        }

        for ($i = 1; $i <= $typeIndicator->getNumIndependentVars(); $i++) {
            $areasUniquesIds = new IndependentVariableUniqueIds($values->getIndependentVariables($i));
            $dictionaries[] = new IndependentVariableDictionary($this->independentVariableRepository->getIndependentVariablesByFilter($locale, $areasUniquesIds->getUniqueIds()));
        }

        return $dictionaries;
    }
}