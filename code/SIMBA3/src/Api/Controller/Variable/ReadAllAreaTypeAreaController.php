<?php


namespace SIMBA3\Api\Controller\Variable;


use SIMBA3\Component\Application\Variable\Request\ReadAllAreaTypeAreaRequest;
use SIMBA3\Component\Application\Variable\UseCase\ReadAllAreaTypeAreaUseCase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ReadAllAreaTypeAreaController
{
    private ReadAllAreaTypeAreaUseCase $readAreaTypeAreaUseCase;

    public function __construct(ReadAllAreaTypeAreaUseCase $readAreaTypeAreaUseCase)
    {
        $this->readAreaTypeAreaUseCase = $readAreaTypeAreaUseCase;
    }

    public function execute(int $typeAreaId): Response
    {
        try {

            $areaTypeAreaResponse = $this->readAreaTypeAreaUseCase->execute(new ReadAllAreaTypeAreaRequest($typeAreaId));
            return new JsonResponse($areaTypeAreaResponse->getAllTypeArea(), Response::HTTP_OK);

        } catch (\InvalidArgumentException $exception) {

            return new Response("", Response::HTTP_NOT_FOUND);
        }
        
    }
}