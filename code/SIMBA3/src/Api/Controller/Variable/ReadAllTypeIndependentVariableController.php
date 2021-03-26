<?php


namespace SIMBA3\Api\Controller\Variable;


use SIMBA3\Component\Application\Variable\Request\ReadAllTypeIndependentVariableRequest;
use SIMBA3\Component\Application\Variable\UseCase\ReadAllTypeAreaUseCase;
use SIMBA3\Component\Application\Variable\UseCase\ReadAllTypeIndependentVariableUseCase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ReadAllTypeIndependentVariableController
{
    private ReadAllTypeIndependentVariableUseCase $readAllTypeIndependentVariableUseCase;

    public function __construct(ReadAllTypeIndependentVariableUseCase $readAllTypeIndependentVariableUseCase)
    {
        $this->readAllTypeIndependentVariableUseCase = $readAllTypeIndependentVariableUseCase;
    }

    public function execute(Request $request): Response
    {
        $typeIndependentVariableResponse = $this->readAllTypeIndependentVariableUseCase->execute(new ReadAllTypeIndependentVariableRequest($request->getLocale()));
        return new JsonResponse($typeIndependentVariableResponse->getAllTypeIndependentVariable(), Response::HTTP_OK);
    }
}