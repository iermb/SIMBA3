<?php


namespace SIMBA3\Component\Domain\Value\Service;


use SIMBA3\Component\Domain\Value\Repository\AreaYearValueRepository;
use SIMBA3\Component\Domain\Value\Repository\YearValueRepository;

class FactoryTypeValue
{
    private AreaYearValueRepository $areaYearValueRepository;
    private YearValueRepository $yearValueRepository;

    public function __construct(
        AreaYearValueRepository $areaYearValueRepository,
        YearValueRepository $yearValueRepository
    ) {
        $this->areaYearValueRepository = $areaYearValueRepository;
        $this->yearValueRepository = $yearValueRepository;
    }

    public function getObjectTypeValue(string $objectType): TypeValue
    {
       switch ($objectType) {
            case "AREA_YEAR_VALUE":
                return new AreaYearTypeValue($this->areaYearValueRepository);

            case "YEAR_VALUE":
                return new YearTypeValue($this->yearValueRepository);

            default:
                throw new \InvalidArgumentException("Not exists the type value:" . $objectType);
        }
    }
}