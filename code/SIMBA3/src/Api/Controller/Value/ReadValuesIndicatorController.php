<?php


namespace SIMBA3\Api\Controller\Value;


use InvalidArgumentException;
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
            return new JsonResponse(
                $this->readValuesIndicatorUseCase->execute(
                    new ReadValuesIndicatorRequest($indicatorId)
                )->getValuesAsArray(),
                Response::HTTP_OK
            );
        } catch (InvalidArgumentException $exception) {
            return new Response($exception->getMessage(), Response::HTTP_NOT_FOUND);
        }
    }
}