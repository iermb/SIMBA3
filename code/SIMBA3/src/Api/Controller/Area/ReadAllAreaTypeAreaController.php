<?php


namespace SIMBA3\Api\Controller\Area;


use SIMBA3\Component\Application\Area\Request\ReadAllAreaTypeAreaRequest;
use SIMBA3\Component\Application\Area\UseCase\ReadAllAreaTypeAreaUseCase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ReadAllAreaTypeAreaController
{
    private ReadAllAreaTypeAreaUseCase $readAreaTypeAreaUseCase;

    public function __construct(ReadAllAreaTypeAreaUseCase $readAreaTypeAreaUseCase)
    {
        $this->readAreaTypeAreaUseCase = $readAreaTypeAreaUseCase;
    }

    public function execute(int $areaTypeId): Response
    {
        $areaTypeAreaResponse = $this->readAreaTypeAreaUseCase->execute(new ReadAllAreaTypeAreaRequest($areaTypeId));
        return new JsonResponse($areaTypeAreaResponse->getAllTypeArea(), Response::HTTP_OK);
    }
}