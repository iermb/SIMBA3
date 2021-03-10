<?php


namespace SIMBA3\Component\Domain\Value\Service;


use InvalidArgumentException;
use SIMBA3\Component\Application\Filter\Service\CreateAreasFilter;
use SIMBA3\Component\Application\Filter\Service\CreateIndependentVariable1sFilter;
use SIMBA3\Component\Application\Filter\Service\CreateIndicatorFilter;
use SIMBA3\Component\Application\Filter\Service\CreateYearsFilter;
use SIMBA3\Component\Domain\Value\Repository\AreaIndependentVariable1YearValueRepository;
use SIMBA3\Component\Domain\Value\Repository\AreaYearValueRepository;
use SIMBA3\Component\Domain\Value\Repository\YearValueRepository;

class FactoryTypeValue
{
    public const AREA_YEAR_VALUE_TYPE = "AREA_YEAR_VALUE";
    public const AREA_INDEPENDENT_VARIABLE_1_YEAR_VALUE_TYPE = "AREA_INDEPENDENT_VARIABLE_1_YEAR_VALUE";
    public const AREA_INDEPENDENT_VARIABLE_3_YEAR_VALUE_TYPE = "AREA_INDEPENDENT_VARIABLE_3_YEAR_VALUE";
    public const YEAR_VALUE_TYPE = "YEAR_VALUE";

    private AreaYearValueRepository $areaYearValueRepository;
    private AreaIndependentVariable1YearValueRepository $areaIndependentVariable1YearValueRepository;
    private YearValueRepository     $yearValueRepository;

    public function __construct(
        AreaYearValueRepository $areaYearValueRepository,
        AreaIndependentVariable1YearValueRepository $areaIndependentVariable1YearValueRepository,
        YearValueRepository $yearValueRepository
    ) {
        $this->areaYearValueRepository = $areaYearValueRepository;
        $this->areaIndependentVariable1YearValueRepository = $areaIndependentVariable1YearValueRepository;
        $this->yearValueRepository = $yearValueRepository;
    }

    public function getObjectTypeValue(
        string $objectType,
        int $indicatorId,
        array $filters
    ): TypeValue {

        $createIndicatorFilter = new CreateIndicatorFilter($indicatorId);
        $createAreasFilter = new CreateAreasFilter($filters);
        $createIndependentVariable1sFilter = new CreateIndependentVariable1sFilter($filters);
        $createYearsFilter = new CreateYearsFilter($filters);

        switch ($objectType) {
            case self::AREA_YEAR_VALUE_TYPE:
                return new AreaYearTypeValue($this->areaYearValueRepository, $createIndicatorFilter->getFilter(),
                    $createAreasFilter->getFilter(), $createYearsFilter->getFilter());

            case self::AREA_INDEPENDENT_VARIABLE_1_YEAR_VALUE_TYPE:
                return new AreaIndependentVariable1YearTypeValue(
                    $this->areaIndependentVariable1YearValueRepository,
                    $createIndicatorFilter->getFilter(),
                    $createAreasFilter->getFilter(),
                    $createIndependentVariable1sFilter->getFilter(),
                    $createYearsFilter->getFilter()
                );

           /* case self::AREA_INDEPENDENT_VARIABLE_3_YEAR_VALUE_TYPE:
                return new AreaIndependentVariable3YearTypeValue(
                    $this->areaIndependentVariable3YearValueRepository,
                    $createIndicatorFilter->getFilter(),
                    $createAreasFilter->getFilter(),
                    $createIndependentVariable3sFilter->getFilter(),
                    $createYearsFilter->getFilter()
                );
                */

            case self::YEAR_VALUE_TYPE:
                return new YearTypeValue($this->yearValueRepository, $createIndicatorFilter->getFilter(),
                    $createYearsFilter->getFilter());

            default :
                throw new InvalidArgumentException("Not exists the type value:" . $objectType);
        }
    }
}