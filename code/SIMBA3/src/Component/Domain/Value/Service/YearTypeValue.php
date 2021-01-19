<?php


namespace SIMBA3\Component\Domain\Value\Service;


use SIMBA3\Component\Domain\Value\Repository\YearValueRepository;

class YearTypeValue implements TypeValue
{
    private YearValueRepository $yearValueRepository;

    public function __construct(YearValueRepository $yearValueRepository)
    {
        $this->yearValueRepository = $yearValueRepository;
    }

    public function getTypeValueArray(): TypeValueArray
    {
        return new YearTypeValueArray($this->yearValueRepository->getValues([]));
    }
}