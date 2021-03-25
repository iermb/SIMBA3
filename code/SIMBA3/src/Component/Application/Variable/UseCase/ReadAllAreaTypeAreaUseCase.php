<?php


namespace SIMBA3\Component\Application\Variable\UseCase;


use SIMBA3\Component\Application\Variable\Request\ReadAllAreaTypeAreaRequest;
use SIMBA3\Component\Application\Variable\Response\ReadAllAreaTypeAreaResponse;
use SIMBA3\Component\Domain\Variable\Repository\TypeAreaRepository;
use SIMBA3\Component\Domain\Variable\Repository\AreaRepository;

class ReadAllAreaTypeAreaUseCase
{
    private TypeAreaRepository $typeAreaRepository;
    private AreaRepository $areaRepository;

    public function __construct(
        TypeAreaRepository $typeAreaRepository,
        AreaRepository $areaRepository
    ){
        $this->typeAreaRepository = $typeAreaRepository;
        $this->areaRepository = $areaRepository;
    }

    public function execute(ReadAllAreaTypeAreaRequest $areaTypeAreaRequest): ReadAllAreaTypeAreaResponse
    {
        $typeArea = $this->typeAreaRepository->getTypeArea($areaTypeAreaRequest->getLocale(), $areaTypeAreaRequest->getTypeAreaId());
        if (!$typeArea) {
            throw new \InvalidArgumentException("typeArea not exists");
        }

        $areas = $this->areaRepository->getAllAreaByTypeArea($areaTypeAreaRequest->getLocale(), $typeArea->getTypeAreaId());
        return new ReadAllAreaTypeAreaResponse($areas);
    }
}