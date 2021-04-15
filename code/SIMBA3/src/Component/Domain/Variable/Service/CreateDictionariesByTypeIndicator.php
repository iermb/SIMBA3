<?php


namespace SIMBA3\Component\Domain\Variable\Service;


use SIMBA3\Component\Domain\Indicator\Entity\TypeIndicator;
use SIMBA3\Component\Domain\Value\Service\AreaDictionary;
use SIMBA3\Component\Domain\Value\Service\TypeValueArray;
use SIMBA3\Component\Domain\Variable\Repository\AreaRepository;
use SIMBA3\Component\Domain\Variable\Repository\IndependentVariableRepository;
use SIMBA3\Component\Domain\Variable\Repository\YearRepository;

class CreateDictionariesByTypeIndicator
{
    private AreaRepository $areaRepository;
    private YearRepository $yearRepository;
    private IndependentVariableRepository $independentVariableRepository;

    public function __construct(TypeIndicator $typeIndicator, string $locale)
    {
        $this->typeIndicator = $typeIndicator;
        $this->locale = $locale;
    }

    public function getDictionaries(TypeValueArray $values): array
    {
        $dictionaries = array();

        if ($this->typeIndicator->getHasArea()) {
            $areasUniquesIds = new AreasUniquesIds($request->getTypeValueArray());
            $dictionaries[] = new AreaDictionary($this->areaRepository->getAreasByFilter($request->getLocale(), $areasUniquesIds->getAreas()))
        }
        if ($request->getType()->getHasYear()) {

        }

        for ($i = 0; $i < $request->getType()->getNumIndependentVars(); $i++) {

        }

        return $dictionaries;
    }


}