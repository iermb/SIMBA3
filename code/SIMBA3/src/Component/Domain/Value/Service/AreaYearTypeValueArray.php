<?php


namespace SIMBA3\Component\Domain\Value\Service;


use SIMBA3\Component\Domain\Value\Entity\AreaYearValue;
use SIMBA3\Component\Domain\Variable\Entity\Area;

class AreaYearTypeValueArray implements TypeValueArray
{
    private array $listAreaYearValue;
    private CollectionVariables $collectionVariables;

    public function __construct(array $listAreaYearValue)
    {
        $this->listAreaYearValue = $listAreaYearValue;
    }

    public function getValues(): array
    {
        return $this->listAreaYearValue;
    }

    public function getValuesAsArray(): array
    {
        return array_map(array($this, "getAreaYearTypeValueAsArray"), $this->listAreaYearValue);
    }

    private function getAreaYearTypeValueAsArray(AreaYearValue $areaYearValue): array
    {
        return [
            $areaYearValue->getIndicatorId(),
            $areaYearValue->getTypeAreaCode(),
            $areaYearValue->getAreaCode(),
            $areaYearValue->getYear(),
            $areaYearValue->getValue()
        ];
    }

    public function getCollectionVariables(): CollectionVariables
    {
        $this->collectionVariables = new CollectionVariables();

        array_map(function (AreaYearValue $areaYearValue) {

            $this->collectionVariables->addArea(new FactArea(
                $areaYearValue->getTypeAreaCode(),
                $areaYearValue->getAreaCode(),
            ));

            $this->collectionVariables->addYear(new FactYear(
                $areaYearValue->getYear(),
            ));

        }, $this->listAreaYearValue);

        return $this->collectionVariables;
    }
}