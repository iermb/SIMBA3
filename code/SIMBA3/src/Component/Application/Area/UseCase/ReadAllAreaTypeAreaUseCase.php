<?php


namespace SIMBA3\Component\Application\Area\UseCase;


use SIMBA3\Component\Application\Area\Request\ReadAllAreaTypeAreaRequest;
use SIMBA3\Component\Application\Area\Response\ReadAllAreaTypeAreaResponse;
use SIMBA3\Component\Domain\Area\Repository\TypeAreaRepository;
use SIMBA3\Component\Domain\Area\Repository\AreaRepository;

class ReadAllAreaTypeAreaUseCase
{
    private TypeAreaRepository $typeAreaRepository;
    private AreaRepository $areaRepository;

    public function __construct(
        TypeAreaRepository $typeAreaRepository,
        AreaRepository $areaRepository,
    ){
        $this->typeAreaRepository = $typeAreaRepository;
        $this->areaRepository = $areaRepository;
    }

    public function execute(ReadAllAreaTypeAreaRequest $areaTypeAreaRequest): ReadAllAreaTypeAreaResponse
    {
        $typeArea = $this->typeAreaRepository->getTypeArea($areaTypeAreaRequest->getTypeAreaId());
        if (!$typeArea) {
            throw new \InvalidArgumentException("typeArea not exists");
        }

        $areas = $this->areaRepository->getAllAreaByTypeArea($typeArea->getId());
        return new ReadAllAreaTypeAreaResponse($areas);
    }
}