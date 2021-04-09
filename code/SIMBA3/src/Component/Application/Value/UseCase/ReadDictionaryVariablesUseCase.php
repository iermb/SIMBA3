<?php


namespace SIMBA3\Component\Application\Value\UseCase;


use InvalidArgumentException;
use SIMBA3\Component\Application\Value\Request\ReadDictionaryVariablesRequest;
use SIMBA3\Component\Domain\Value\Service\AreaDictionary;
use SIMBA3\Component\Domain\Value\Service\IndependentVariableDictionary;
use SIMBA3\Component\Domain\Value\Service\AreaIndependentVariable1YearTypeValueUniqueIds;
use SIMBA3\Component\Domain\Value\Service\AreaIndependentVariable2YearTypeValueUniqueIds;
use SIMBA3\Component\Domain\Value\Service\AreaYearTypeValueUniqueIds;
use SIMBA3\Component\Domain\Value\Service\FactoryTypeValue;
use SIMBA3\Component\Domain\Value\Service\YearDictionary;
use SIMBA3\Component\Domain\Value\Service\YearTypeValueUniqueIds;
use SIMBA3\Component\Domain\Variable\Repository\AreaRepository;
use SIMBA3\Component\Domain\Variable\Repository\IndependentVariableRepository;
use SIMBA3\Component\Domain\Variable\Repository\YearRepository;

class ReadDictionaryVariablesUseCase
{
    private AreaRepository $areaRepository;
    private YearRepository $yearRepository;
    private IndependentVariableRepository $independentVariableRepository;

    public function __construct(
        AreaRepository $areaRepository,
        IndependentVariableRepository $independentVariableRepository,
        YearRepository $yearRepository
    ) {
        $this->areaRepository = $areaRepository;
        $this->independentVariableRepository = $independentVariableRepository;
        $this->yearRepository = $yearRepository;
    }

    public function execute(ReadDictionaryVariablesRequest $request): array
    {
        switch ($request->getType()) {
            case FactoryTypeValue::AREA_YEAR_VALUE_TYPE:
                $areaYearTypeValueUniqueIds = new AreaYearTypeValueUniqueIds($request->getTypeValueArray());
                return [
                    new AreaDictionary($this->areaRepository->getAreasByFilter($request->getLocale(), $areaYearTypeValueUniqueIds->getAreaUniqueIds())),
                    new YearDictionary($this->yearRepository->getYearsByFilter($areaYearTypeValueUniqueIds->getYearUniqueIds()))
                ];

            case FactoryTypeValue::AREA_INDEPENDENT_VARIABLE_1_YEAR_VALUE_TYPE:
                $areaIndependentVariable1YearTypeValueUniqueIds = new AreaIndependentVariable1YearTypeValueUniqueIds($request->getTypeValueArray());
                return [
                    new AreaDictionary($this->areaRepository->getAreasByFilter($request->getLocale(), $areaIndependentVariable1YearTypeValueUniqueIds->getAreaUniqueCodes())),
                    new IndependentVariableDictionary($this->independentVariableRepository->getIndependentVariablesByFilter($request->getLocale(), $areaIndependentVariable1YearTypeValueUniqueIds->getIndependentVariable1Codes())),
                    new YearDictionary($this->yearRepository->getYearsByFilter($areaIndependentVariable1YearTypeValueUniqueIds->getYearUniqueIds())),
                ];

            case FactoryTypeValue::AREA_INDEPENDENT_VARIABLE_2_YEAR_VALUE_TYPE:
                $areaIndependentVariable2YearTypeValueUniqueIds = new AreaIndependentVariable2YearTypeValueUniqueIds($request->getTypeValueArray());
                return [
                    new AreaDictionary($this->areaRepository->getAreasByFilter($request->getLocale(), $areaIndependentVariable2YearTypeValueUniqueIds->getAreaUniqueCodes())),
                    new IndependentVariableDictionary($this->independentVariableRepository->getIndependentVariablesByFilter($request->getLocale(), $areaIndependentVariable2YearTypeValueUniqueIds->getIndependentVariable1Codes())),
                    new IndependentVariableDictionary($this->independentVariableRepository->getIndependentVariablesByFilter($request->getLocale(), $areaIndependentVariable2YearTypeValueUniqueIds->getIndependentVariable2Codes())),
                    new YearDictionary($this->yearRepository->getYearsByFilter($areaIndependentVariable2YearTypeValueUniqueIds->getYearUniqueIds())),
                ];

            case FactoryTypeValue::YEAR_VALUE_TYPE:
                $yearTypeValueUniqueIds = new YearTypeValueUniqueIds($request->getTypeValueArray());
                return [new YearDictionary($this->yearRepository->getYearsByFilter($yearTypeValueUniqueIds->getYearUniqueIds()))];

            default:
                throw new InvalidArgumentException(sprintf('There is not Dictionary defined for type: %s',$request->getType()));
        }
    }

}