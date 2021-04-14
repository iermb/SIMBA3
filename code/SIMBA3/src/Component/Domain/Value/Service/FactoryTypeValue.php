<?php


namespace SIMBA3\Component\Domain\Value\Service;


use InvalidArgumentException;
use SIMBA3\Component\Application\Filter\Service\CreateAreasFilter;
use SIMBA3\Component\Application\Filter\Service\CreateIndependentVariablesFilter;
use SIMBA3\Component\Application\Filter\Service\CreateIndicatorFilter;
use SIMBA3\Component\Application\Filter\Service\CreateYearsFilter;
use SIMBA3\Component\Domain\Value\Repository\AreaIndependentVariable1YearValueRepository;
use SIMBA3\Component\Domain\Value\Repository\AreaIndependentVariable2YearValueRepository;
use SIMBA3\Component\Domain\Value\Repository\AreaYearValueRepository;
use SIMBA3\Component\Domain\Value\Repository\YearValueRepository;

class FactoryTypeValue
{
    private const CLASS_NAME_DICTIONARY = 'SIMBA3\\Component\\Domain\\Value\\Service\\';

    private const INDEPENDENT_VARIABLES_1_FILTER = 'independentVariable1s';
    private const INDEPENDENT_VARIABLES_2_FILTER = 'independentVariable2s';

    private AreaYearValueRepository $areaYearValueRepository;
    private AreaIndependentVariable1YearValueRepository $areaIndependentVariable1YearValueRepository;
    private AreaIndependentVariable2YearValueRepository $areaIndependentVariable2YearValueRepository;
    private YearValueRepository     $yearValueRepository;

    public function __construct(
        AreaYearValueRepository $areaYearValueRepository,
        AreaIndependentVariable1YearValueRepository $areaIndependentVariable1YearValueRepository,
        AreaIndependentVariable2YearValueRepository $areaIndependentVariable2YearValueRepository,
        YearValueRepository $yearValueRepository
    ) {
        $this->areaYearValueRepository = $areaYearValueRepository;
        $this->areaIndependentVariable1YearValueRepository = $areaIndependentVariable1YearValueRepository;
        $this->areaIndependentVariable2YearValueRepository = $areaIndependentVariable2YearValueRepository;
        $this->yearValueRepository = $yearValueRepository;
    }

    public function getObjectTypeValue(
        string $objectType,
        int $indicatorId,
        array $filters
    ): TypeValue {

        $createIndicatorFilter = new CreateIndicatorFilter($indicatorId);
        $createYearsFilter = new CreateYearsFilter($filters);

        $objectTypeClassName = self::CLASS_NAME_DICTIONARY . $objectType;

        switch ($objectTypeClassName) {
            case AreaYearDictionaryTypeValue::class:
                $createAreasFilter = new CreateAreasFilter($filters);
                return new AreaYearTypeValue(
                    $this->areaYearValueRepository,
                    $createIndicatorFilter->getFilter(),
                    $createAreasFilter->getFilter(),
                    $createYearsFilter->getFilter()
                );

            case AreaIndependentVariable1YearDictionaryTypeValue::class:
                $createAreasFilter = new CreateAreasFilter($filters);
                $createIndependentVariable1sFilter = new CreateIndependentVariablesFilter($filters, self::INDEPENDENT_VARIABLES_1_FILTER);
                return new AreaIndependentVariable1YearTypeValue(
                    $this->areaIndependentVariable1YearValueRepository,
                    $createIndicatorFilter->getFilter(),
                    $createAreasFilter->getFilter(),
                    $createIndependentVariable1sFilter->getFilter(),
                    $createYearsFilter->getFilter()
                );

            case AreaIndependentVariable2YearDictionaryTypeValue::class:
                $createAreasFilter = new CreateAreasFilter($filters);
                $createIndependentVariable1sFilter = new CreateIndependentVariablesFilter($filters, self::INDEPENDENT_VARIABLES_1_FILTER);
                $createIndependentVariable2sFilter = new CreateIndependentVariablesFilter($filters, self::INDEPENDENT_VARIABLES_2_FILTER);
                return new AreaIndependentVariable2YearTypeValue(
                    $this->areaIndependentVariable2YearValueRepository,
                    $createIndicatorFilter->getFilter(),
                    $createAreasFilter->getFilter(),
                    $createIndependentVariable1sFilter->getFilter(),
                    $createIndependentVariable2sFilter->getFilter(),
                    $createYearsFilter->getFilter()
                );

            case YearDictionaryTypeValue::class:
                return new YearTypeValue(
                    $this->yearValueRepository,
                    $createIndicatorFilter->getFilter(),
                    $createYearsFilter->getFilter()
                );

            default :
                throw new InvalidArgumentException("Not exists type value:" . $objectType);
        }
    }
}