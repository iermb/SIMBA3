<?php


namespace SIMBA3\Component\Domain\Value\Service;

use SIMBA3\Component\Domain\Value\Repository\AreaYearValueRepository;

class AreaYearTypeValue implements TypeValue
{
    private AreaYearValueRepository $areaYearValueRepository;

    public function __construct(AreaYearValueRepository $areaYearValueRepository)
    {
        $this->areaYearValueRepository = $areaYearValueRepository;
    }

    public function getTypeValueArray(int $typeIndicatorId): TypeValueArray
    {
        return new AreaYearTypeValueArray($this->areaYearValueRepository->getValues([
            'indicatorId' => $typeIndicatorId
        ]));
    }
}