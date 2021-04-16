<?php


namespace SIMBA3\Component\Domain\Variable\Service;


use SIMBA3\Component\Domain\Indicator\Entity\TypeIndicator;
use SIMBA3\Component\Domain\Value\Service\AreaDictionary;
use SIMBA3\Component\Domain\Value\Service\IndependentVariableDictionary;
use SIMBA3\Component\Domain\Value\Service\TypeValueArray;
use SIMBA3\Component\Domain\Value\Service\YearDictionary;
use SIMBA3\Component\Domain\Variable\Repository\AreaRepository;
use SIMBA3\Component\Domain\Variable\Repository\IndependentVariableRepository;
use SIMBA3\Component\Domain\Variable\Repository\YearRepository;

class CreateDictionariesFromValues
{
    private AreaRepository                $areaRepository;
    private IndependentVariableRepository $independentVariableRepository;
    private YearRepository                $yearRepository;

    public function __construct(
        AreaRepository $areaRepository,
        IndependentVariableRepository $independentVariableRepository,
        YearRepository $yearRepository
    ) {
        $this->areaRepository = $areaRepository;
        $this->independentVariableRepository = $independentVariableRepository;
        $this->yearRepository = $yearRepository;
    }


    public function getDictionaries(TypeIndicator $typeIndicator, TypeValueArray $typeValueArray, string $locale): array
    {
        $dictionaries = array();

        if ($typeIndicator->hasArea()) {
            $dictionaries[] = new AreaDictionary($this->areaRepository->getAreasByFilter($locale,
                $typeValueArray->getAreas()));
        }

        for ($i = 1; $i <= $typeIndicator->getNumIndependentVars(); $i++) {
            $dictionaries[] = new IndependentVariableDictionary($this->independentVariableRepository->getIndependentVariablesByFilter($locale,
                $typeValueArray->getIndependentVariable($i)));
        }

        if ($typeIndicator->hasYear()) {
            $dictionaries[] = new YearDictionary($this->yearRepository->getYearsByFilter($typeValueArray->getYears()));
        }

        return $dictionaries;
    }
}