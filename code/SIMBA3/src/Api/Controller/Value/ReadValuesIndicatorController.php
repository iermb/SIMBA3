<?php


namespace SIMBA3\Api\Controller\Value;


use InvalidArgumentException;
use SIMBA3\Component\Application\Value\Request\ReadValuesIndicatorRequest;
use SIMBA3\Component\Application\Value\UseCase\ReadValuesIndicatorUseCase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ReadValuesIndicatorController
{
    private const FILTER = "filter";
    private ReadValuesIndicatorUseCase $readValuesIndicatorUseCase;

    public function __construct(
        ReadValuesIndicatorUseCase $readValuesIndicatorUseCase
    ) {
        $this->readValuesIndicatorUseCase = $readValuesIndicatorUseCase;
    }

    public function execute(int $indicatorId, Request $request): Response
    {
        try {
            $filters = json_decode($request->get(self::FILTER), true);
            if (!$filters) {
                $filters = array();
            }
            $response = $this->readValuesIndicatorUseCase->execute(
                new ReadValuesIndicatorRequest($request->getLocale(), $indicatorId, $filters)
            );
            $response = [
                $response->getMetadataIndicatorAsArray(),
                $response->getDictionariesAsArray(),
                $response->getValuesAsArray()
            ];
            print_r('.'); //Fix Bug JsonResponse Bad Gateway
            return new JsonResponse(
                $response,
                Response::HTTP_OK
            );
        } catch (InvalidArgumentException $exception) {
            return new Response($exception->getMessage(), Response::HTTP_NOT_FOUND);
        }
    }
}