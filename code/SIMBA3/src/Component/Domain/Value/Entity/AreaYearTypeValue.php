<?php


namespace SIMBA3\Component\Domain\Value\Entity;


use SIMBA3\Component\Domain\Value\Repository\ValueRepository;

class AreaYearTypeValue implements TypeValue
{
    private ValueRepository $valueRepository;

    public function __construct(ValueRepository $valueRepository)
    {
        $this->valueRepository = $valueRepository;
    }


    public function getTypeValueArray(): TypeValueArray
    {
        return new AreaYearTypeValueArray($this->valueRepository->getValues(array()));
    }
}