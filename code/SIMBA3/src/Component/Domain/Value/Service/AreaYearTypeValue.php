<?php


namespace SIMBA3\Component\Domain\Value\Service;

use SIMBA3\Component\Domain\Indicator\Entity\TypeIndicator;
use SIMBA3\Component\Domain\Value\Repository\AreaYearValueRepository;

class AreaYearTypeValue implements TypeValue
{
    private AreaYearValueRepository $areaYearValueRepository;

    public function __construct(AreaYearValueRepository $areaYearValueRepository)
    {
        $this->areaYearValueRepository = $areaYearValueRepository;
    }

    public function getTypeValueArray(TypeIndicator $typeIndicator): TypeValueArray
    {
        $areaYearValues = $this->areaYearValueRepository->getValues([
            'indicatorId' => $typeIndicator
        ]);

        return new AreaYearTypeValueArray($areaYearValues);
    }
}