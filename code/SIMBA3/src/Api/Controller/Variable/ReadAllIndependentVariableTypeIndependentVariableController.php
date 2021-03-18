<?php


namespace SIMBA3\Api\Controller\Variable;


use SIMBA3\Component\Application\Variable\Request\ReadAllIndependentVariableTypeIndependentVariableRequest;
use SIMBA3\Component\Application\Variable\UseCase\ReadAllIndependentVariableTypeIndependentVariableUseCase;
use SIMBA3\Component\Application\Variable\UseCase\ReadAllTypeAreaUseCase;
use SIMBA3\Component\Application\Variable\UseCase\ReadAllTypeIndependentVariableUseCase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ReadAllIndependentVariableTypeIndependentVariableController
{
    private ReadAllIndependentVariableTypeIndependentVariableUseCase $readAllIndependentVariableTypeIndependentVariableUseCase;

    public function __construct(ReadAllIndependentVariableTypeIndependentVariableUseCase $readAllIndependentVariableTypeIndependentVariableUseCase)
    {
        $this->readAllIndependentVariableTypeIndependentVariableUseCase = $readAllIndependentVariableTypeIndependentVariableUseCase;
    }

    public function execute(int $typeIndependentVariableId): Response
    {
        try {

            $independentVariableResponse = $this->readAllIndependentVariableTypeIndependentVariableUseCase->execute(new ReadAllIndependentVariableTypeIndependentVariableRequest($typeIndependentVariableId));
            return new JsonResponse($independentVariableResponse->getAllIndependentVariable(), Response::HTTP_OK);

        } catch (\InvalidArgumentException $exception) {

            return new Response("", Response::HTTP_NOT_FOUND);
        }

    }
}