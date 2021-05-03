<?php


namespace SIMBA3\Api\Controller\VariableIndicator;


use InvalidArgumentException;
use SIMBA3\Component\Application\VariableIndicator\Request\ReadAreasIndicatorRequest;
use SIMBA3\Component\Application\VariableIndicator\UseCase\ReadAreasIndicatorUseCase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ReadAreasIndicatorController
{
    private ReadAreasIndicatorUseCase $readAreasIndicatorUseCase;

    public function __construct(ReadAreasIndicatorUseCase $readAreasIndicatorUseCase)
    {
        $this->readAreasIndicatorUseCase = $readAreasIndicatorUseCase;
    }

    public function execute(Request $request, int $indicatorId): Response
    {
        try {
            return new JsonResponse($this->readAreasIndicatorUseCase->execute(new ReadAreasIndicatorRequest($indicatorId,
                $request->getLocale()))->getAreasIndicatorAsArray());
        } catch (InvalidArgumentException $exception) {
            return new Response('', Response::HTTP_NOT_FOUND);
        }
    }

}