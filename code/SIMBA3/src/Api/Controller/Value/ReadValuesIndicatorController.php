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
        return new JsonResponse(
            $this->readValuesIndicatorUseCase->execute(new ReadValuesIndicatorRequest($indicatorId)), Response::HTTP_OK
        );
    }

}