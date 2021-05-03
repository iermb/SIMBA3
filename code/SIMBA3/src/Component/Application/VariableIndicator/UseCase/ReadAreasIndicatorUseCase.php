<?php


namespace SIMBA3\Component\Application\VariableIndicator\UseCase;


use SIMBA3\Component\Application\VariableIndicator\Request\ReadAreasIndicatorRequest;
use SIMBA3\Component\Application\VariableIndicator\Response\ReadAreasIndicatorResponse;
use SIMBA3\Component\Domain\Value\Service\TypeValueArray;
use SIMBA3\Component\Domain\Variable\Repository\AreaRepository;
use SIMBA3\Component\Domain\VariableIndicator\Entity\AreaIndicator;
use SIMBA3\Component\Domain\VariableIndicator\Repository\AreaIndicatorRepository;

class ReadAreasIndicatorUseCase
{
    private AreaIndicatorRepository $areaIndicatorRepository;
    private AreaRepository          $areaRepository;

    public function __construct(AreaIndicatorRepository $areaIndicatorRepository, AreaRepository $areaRepository)
    {
        $this->areaIndicatorRepository = $areaIndicatorRepository;
        $this->areaRepository = $areaRepository;
    }

    public function execute(ReadAreasIndicatorRequest $request): ReadAreasIndicatorResponse
    {
        $areas = $this->areaRepository->getAreasByFilter($request->getLocale(),
            array_map(array($this, 'getAreasCodes'),
                $this->areaIndicatorRepository->getAreasIndicatorByIndicator($request->getIndicatorId())));

        return new ReadAreasIndicatorResponse($areas);
    }

    private function getAreasCodes(AreaIndicator $areaIndicator): array
    {
        return [
            TypeValueArray::CODE_TYPE_AREA_FIELD => $areaIndicator->getTypeAreaCode(),
            TypeValueArray::CODE_AREA_FIELD => $areaIndicator->getAreaCode()
        ];
    }

}
