<?php


namespace SIMBA3\Api\Controller\VariableIndicator;


use InvalidArgumentException;
use SIMBA3\Component\Application\VariableIndicator\Request\ReadYearsIndicatorRequest;
use SIMBA3\Component\Application\VariableIndicator\UseCase\ReadYearsIndicatorUseCase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ReadYearsIndicatorController
{
    private ReadYearsIndicatorUseCase $readYearsIndicatorUseCase;

    public function __construct(ReadYearsIndicatorUseCase $readYearsIndicatorUseCase)
    {
        $this->readYearsIndicatorUseCase = $readYearsIndicatorUseCase;
    }

    public function execute(Request $request, int $indicatorId): Response
    {
        try {
            return new JsonResponse($this->readYearsIndicatorUseCase->execute(new ReadYearsIndicatorRequest($indicatorId,
                $request->getLocale()))->getYearsIndicatorAsArray(), Response::HTTP_OK);
        } catch (InvalidArgumentException $exception) {
            return new Response('', Response::HTTP_NOT_FOUND);
        }
    }


}