<?php


namespace SIMBA3\Api\Controller\Indicator;


use SIMBA3\Component\Application\Indicator\Request\ReadInfoIndicatorRequest;
use SIMBA3\Component\Application\Indicator\UseCase\ReadInfoIndicatorUseCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ReadIndicatorController
{
    private const ID_FIELD = "id";
    private ReadInfoIndicatorUseCase $readInfoIndicatorUseCase;

    public function __construct(ReadInfoIndicatorUseCase $readInfoIndicatorUseCase)
    {
        $this->readInfoIndicatorUseCase = $readInfoIndicatorUseCase;
    }

    public function execute(Request $request): Response
    {
        $input = json_decode($request->getContent(), true);

        if (!isset($input[self::ID_FIELD])) {
            return new Response("", Response::HTTP_BAD_REQUEST);
        }

        $idIndicator = $input[self::ID_FIELD];

        $indicatorResponse = $this->readInfoIndicatorUseCase->execute(new ReadInfoIndicatorRequest($idIndicator));

        return new JsonResponse($indicatorResponse->getIndicatorAsArray(), Response::HTTP_OK);
    }
}