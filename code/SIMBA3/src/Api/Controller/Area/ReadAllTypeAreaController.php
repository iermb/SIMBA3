<?php


namespace SIMBA3\Api\Controller\Area;


use SIMBA3\Component\Application\Area\UseCase\ReadAllTypeAreaUseCase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ReadAllTypeAreaController
{
    private ReadAllTypeAreaUseCase $readAllTypeAreaUseCase;

    public function __construct(ReadAllTypeAreaUseCase $readAllTypeAreaUseCase)
    {
        $this->readAllTypeAreaUseCase = $readAllTypeAreaUseCase;
    }

    public function execute(): Response
    {
        $indicatorResponse = $this->readAllTypeAreaUseCase->execute();
        return new JsonResponse($indicatorResponse->getIndicatorAsArray(), Response::HTTP_OK);
    }
}