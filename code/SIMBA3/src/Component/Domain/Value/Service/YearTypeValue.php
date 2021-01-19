<?php


namespace SIMBA3\Component\Domain\Value\Service;

use SIMBA3\Component\Domain\Indicator\Entity\TypeIndicator;
use SIMBA3\Component\Domain\Value\Repository\YearValueRepository;

class YearTypeValue implements TypeValue
{
    private YearValueRepository $yearValueRepository;

    public function __construct(YearValueRepository $yearValueRepository)
    {
        $this->yearValueRepository = $yearValueRepository;
    }

    public function getTypeValueArray(TypeIndicator $typeIndicator): TypeValueArray
    {
        $yearValues = $this->yearValueRepository->getValues([
            'indicatorId' => $typeIndicator
        ]);
        
        return new YearTypeValueArray($yearValues);
    }
}