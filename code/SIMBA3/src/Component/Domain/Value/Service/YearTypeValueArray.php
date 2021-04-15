<?php


namespace SIMBA3\Component\Domain\Value\Service;


use SIMBA3\Component\Domain\Value\Entity\AreaIndependentVariable2YearValue;
use SIMBA3\Component\Domain\Value\Entity\YearValue;

class YearTypeValueArray implements TypeValueArray
{
    private array $listYearValue;
    private CollectionVariables $collectionVariables;

    public function __construct(array $listYearValue)
    {
        $this->listYearValue = $listYearValue;
    }

    public function getValues(): array
    {
        return $this->listYearValue;
    }

    public function getValuesAsArray(): array
    {
        return array_map(array($this, "getYearTypeValueAsArray"), $this->listYearValue);
    }

    private function getYearTypeValueAsArray(YearValue $yearValue): array
    {
        return [
            $yearValue->getIndicatorId(),
            $yearValue->getYear(),
            $yearValue->getValue()
        ];
    }

    public function getCollectionVariables(): CollectionVariables
    {
        $this->collectionVariables = new CollectionVariables();

        array_map(function (YearValue $yearValue) {

            $this->collectionVariables->addYear(new FactYear(
                $yearValue->getYear(),
            ));

        }, $this->listYearValue);

        return $this->collectionVariables;
    }
}