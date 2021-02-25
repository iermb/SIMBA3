<?php


namespace SIMBA3\Component\Application\Value\UseCase;


use InvalidArgumentException;
use SIMBA3\Component\Application\Value\Request\ReadDictionaryVariablesRequest;
use SIMBA3\Component\Domain\Value\Service\AreaDictionary;
use SIMBA3\Component\Domain\Value\Service\AreaYearTypeValueUniqueIds;
use SIMBA3\Component\Domain\Value\Service\FactoryTypeValue;
use SIMBA3\Component\Domain\Value\Service\YearDictionary;
use SIMBA3\Component\Domain\Value\Service\YearTypeValueUniqueIds;
use SIMBA3\Component\Domain\Variable\Repository\AreaRepository;

class ReadDictionaryVariablesUseCase
{
    private AreaRepository $areaRepository;

    public function __construct(AreaRepository $areaRepository)
    {
        $this->areaRepository = $areaRepository;
    }

    public function execute(ReadDictionaryVariablesRequest $request): array
    {
        switch ($request->getType()) {
            case FactoryTypeValue::AREA_YEAR_VALUE_TYPE:
                $areaYearTypeValueUniqueIds = new AreaYearTypeValueUniqueIds($request->getTypeValueArray());
                return [
                    new AreaDictionary($this->areaRepository->getAreasByFilter($areaYearTypeValueUniqueIds->getAreaUniqueIds())),
                    new YearDictionary($areaYearTypeValueUniqueIds->getYearUniqueIds())
                ];
            case FactoryTypeValue::YEAR_VALUE_TYPE:
                $yearTypeValueUniqueIds = new YearTypeValueUniqueIds($request->getTypeValueArray());
                return [new YearDictionary($yearTypeValueUniqueIds->getYearUniqueIds())];
            default:
                throw new InvalidArgumentException();
        }
    }

}