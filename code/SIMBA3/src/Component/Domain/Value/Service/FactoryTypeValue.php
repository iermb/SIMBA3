<?php


namespace SIMBA3\Component\Domain\Value\Service;


use InvalidArgumentException;
use SIMBA3\Component\Domain\Value\Repository\AreaYearValueRepository;

class FactoryTypeValue
{
    private AreaYearValueRepository $areaYearValueRepository;

    public function __construct(AreaYearValueRepository $areaYearValueRepository)
    {
        $this->areaYearValueRepository = $areaYearValueRepository;
    }

    public function getObjectTypeValue(string $objectType): TypeValue
    {
        switch ($objectType) {
            case "AREA_YEAR_VALUE":
                return new AreaYearTypeValue($this->areaYearValueRepository);
            default:
                throw new InvalidArgumentException("Not exists the type value");
        }
    }
}