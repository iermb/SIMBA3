<?php


namespace SIMBA3\Component\Application\Value\UseCase;


use InvalidArgumentException;
use SIMBA3\Component\Application\Value\Request\ReadDictionaryVariablesRequest;
use SIMBA3\Component\Domain\Value\Service\AreaYearTypeValueUniqueIds;
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
            case "areaYearType":
                $areaYearTypeValueUniqueIds = new AreaYearTypeValueUniqueIds($request->getTypeValueArray());
                return [
                    $this->areaRepository->getAreaByFilter($areaYearTypeValueUniqueIds->getAreaUniqueIds()),
                    $areaYearTypeValueUniqueIds->getYearUniqueIds()
                ];
            case "year":
                $yearTypeValueUniqueIds = new YearTypeValueUniqueIds($request->getTypeValueArray());
                return [$yearTypeValueUniqueIds->getYearUniqueIds()];
            default:
                throw new InvalidArgumentException();
        }
    }

}