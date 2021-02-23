<?php


namespace SIMBA3\Api\Controller\Variable;


use SIMBA3\Component\Application\Variable\UseCase\ReadAllTypeAreaUseCase;
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
        return new JsonResponse($indicatorResponse->getAllTypeArea(), Response::HTTP_OK);
    }
}