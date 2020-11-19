<?php


namespace SIMBA3\Api\Controller\Indicator;


use SIMBA3\Component\Application\Indicator\Request\ReadInfoIndicatorRequest;
use SIMBA3\Component\Application\Indicator\UseCase\ReadInfoIndicatorUseCase;
//use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ReadIndicatorController
{
    private ReadInfoIndicatorUseCase $readInfoIndicatorUseCase;

    public function __construct(ReadInfoIndicatorUseCase $readInfoIndicatorUseCase)
    {
        $this->readInfoIndicatorUseCase = $readInfoIndicatorUseCase;
    }

    public function execute(int $idIndicator): Response
    {
        $indicatorResponse = $this->readInfoIndicatorUseCase->execute(new ReadInfoIndicatorRequest($idIndicator));

        return new JsonResponse($indicatorResponse->getIndicatorAsArray(), Response::HTTP_OK);
    }
}