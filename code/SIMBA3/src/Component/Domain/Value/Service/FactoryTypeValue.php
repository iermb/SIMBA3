<?php


namespace SIMBA3\Component\Domain\Value\Service;


use InvalidArgumentException;
use SIMBA3\Component\Application\Filter\Service\CreateAreasFilter;
use SIMBA3\Component\Application\Filter\Service\CreateIndicatorFilter;
use SIMBA3\Component\Application\Filter\Service\CreateYearsFilter;
use SIMBA3\Component\Domain\Value\Repository\AreaYearValueRepository;
use SIMBA3\Component\Domain\Value\Repository\YearValueRepository;

class FactoryTypeValue
{
    private AreaYearValueRepository $areaYearValueRepository;
    private YearValueRepository     $yearValueRepository;

    public function __construct(
        AreaYearValueRepository $areaYearValueRepository,
        YearValueRepository $yearValueRepository
    ) {
        $this->areaYearValueRepository = $areaYearValueRepository;
        $this->yearValueRepository = $yearValueRepository;
    }

    public function getObjectTypeValue(
        string $objectType,
        int $indicatorId,
        array $filters
    ): TypeValue {
        $createIndicatorFilter = new CreateIndicatorFilter($indicatorId);
        $createAreasFilter = new CreateAreasFilter($filters);
        $createYearsFilter = new CreateYearsFilter($filters);
        switch ($objectType) {
            case "AREA_YEAR_VALUE":
                return new AreaYearTypeValue($this->areaYearValueRepository, $createIndicatorFilter->getFilter(),
                    $createAreasFilter->getFilter(), $createYearsFilter->getFilter());
            case "YEAR_VALUE":
                return new YearTypeValue($this->yearValueRepository, $createIndicatorFilter->getFilter(),
                    $createYearsFilter->getFilter());

            default :
                throw new InvalidArgumentException("Not exists the type value:" . $objectType);
        }
    }
}