<?php


namespace SIMBA3\Api\Controller\Variable;


use SIMBA3\Component\Application\Variable\UseCase\ReadAllTypeAreaUseCase;
use SIMBA3\Component\Application\Variable\UseCase\ReadAllTypeIndependentVariableUseCase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ReadAllTypeIndependentVariableController
{
    private ReadAllTypeIndependentVariableUseCase $readAllTypeIndependentVariableUseCase;

    public function __construct(ReadAllTypeIndependentVariableUseCase $readAllTypeIndependentVariableUseCase)
    {
        $this->readAllTypeIndependentVariableUseCase = $readAllTypeIndependentVariableUseCase;
    }

    public function execute(): Response
    {
        $typeIndependentVariableResponse = $this->readAllTypeIndependentVariableUseCase->execute();
        return new JsonResponse($typeIndependentVariableResponse->getAllTypeIndependentVariable(), Response::HTTP_OK);
    }
}