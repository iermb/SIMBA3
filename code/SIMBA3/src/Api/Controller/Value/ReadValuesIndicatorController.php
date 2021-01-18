<?php


namespace SIMBA3\Api\Controller\Value;


use SIMBA3\Component\Application\Value\Request\ReadValuesIndicatorRequest;
use SIMBA3\Component\Application\Value\UseCase\ReadValuesIndicatorUseCase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ReadValuesIndicatorController
{
    private ReadValuesIndicatorUseCase $readValuesIndicatorUseCase;

    public function __construct(ReadValuesIndicatorUseCase $readValuesIndicatorUseCase)
    {
        $this->readValuesIndicatorUseCase = $readValuesIndicatorUseCase;
    }

    public function execute(int $indicatorId): Response
    {
        try {

            $valueIndicatorResponse = $this->readValuesIndicatorUseCase->execute(new ReadValuesIndicatorRequest($indicatorId));
            return new JsonResponse($valueIndicatorResponse->getValuesAsArray(), Response::HTTP_OK);

        } catch (\InvalidArgumentException $exception) {

            return new Response("", Response::HTTP_NOT_FOUND);
        }
    }
}