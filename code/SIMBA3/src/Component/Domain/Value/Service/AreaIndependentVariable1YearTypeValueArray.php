<?php


namespace SIMBA3\Component\Domain\Value\Service;


use SIMBA3\Component\Domain\Value\Entity\AreaIndependentVariable1YearValue;
use SIMBA3\Component\Domain\Value\Entity\AreaYearValue;

class AreaIndependentVariable1YearTypeValueArray implements TypeValueArray
{
    private array $listAreaIndependentVariable1YearValue;
    private CollectionVariables $collectionVariables;

    public function __construct(array $listAreaIndependentVariable1YearValue)
    {
        $this->listAreaIndependentVariable1YearValue = $listAreaIndependentVariable1YearValue;
    }

    public function getValues(): array
    {
        return $this->listAreaIndependentVariable1YearValue;
    }

    public function getValuesAsArray(): array
    {
        return array_map(array($this, "getAreaIndependentVariable1YearTypeValueAsArray"), $this->listAreaIndependentVariable1YearValue);
    }

    private function getAreaIndependentVariable1YearTypeValueAsArray(AreaIndependentVariable1YearValue $areaIndependentVariable1YearValue): array
    {
        return [
            $areaIndependentVariable1YearValue->getIndicatorId(),
            $areaIndependentVariable1YearValue->getTypeAreaCode(),
            $areaIndependentVariable1YearValue->getAreaCode(),
            $areaIndependentVariable1YearValue->getTypeIndependentVariable1Code(),
            $areaIndependentVariable1YearValue->getIndependentVariable1Code(),
            $areaIndependentVariable1YearValue->getYear(),
            $areaIndependentVariable1YearValue->getValue()
        ];
    }

    public function getCollectionVariables(): CollectionVariables
    {
        $this->collectionVariables = new CollectionVariables();

        array_map(function (AreaIndependentVariable1YearValue $areaIndependentVariable1YearValue) {

            $this->collectionVariables->addArea(new FactArea(
                $areaIndependentVariable1YearValue->getTypeAreaCode(),
                $areaIndependentVariable1YearValue->getAreaCode(),
            ));

            $this->collectionVariables->addIndependentVariable(1, new FactIndependentVariable(
                $areaIndependentVariable1YearValue->getTypeIndependentVariable1Code(),
                $areaIndependentVariable1YearValue->getIndependentVariable1Code(),
            ));

            $this->collectionVariables->addYear(new FactYear(
                $areaIndependentVariable1YearValue->getYear(),
            ));

        }, $this->listAreaIndependentVariable1YearValue);

        return $this->collectionVariables;
    }
}