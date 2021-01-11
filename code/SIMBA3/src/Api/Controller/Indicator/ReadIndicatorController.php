<?php


namespace SIMBA3\Api\Controller\Indicator;


use SIMBA3\Component\Application\Indicator\Request\ReadInfoIndicatorRequest;
use SIMBA3\Component\Application\Indicator\UseCase\ReadInfoIndicatorUseCase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ReadIndicatorController
{
    private ReadInfoIndicatorUseCase $readInfoIndicatorUseCase;

    public function __construct(ReadInfoIndicatorUseCase $readInfoIndicatorUseCase)
    {
        $this->readInfoIndicatorUseCase = $readInfoIndicatorUseCase;
    }

    public function execute(int $indicatorId): Response
    {
        try {
            $indicatorResponse = $this->readInfoIndicatorUseCase->execute(new ReadInfoIndicatorRequest($indicatorId));
            return new JsonResponse($indicatorResponse->getIndicatorAsArray(), Response::HTTP_OK);
        } catch (\InvalidArgumentException $exception) {
            return new Response("", Response::HTTP_NOT_FOUND);
        }
    }
}