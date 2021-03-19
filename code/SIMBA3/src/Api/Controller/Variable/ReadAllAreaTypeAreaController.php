<?php


namespace SIMBA3\Api\Controller\Variable;


use SIMBA3\Component\Application\Locale\Request\ReadLocaleRequest;
use SIMBA3\Component\Application\Locale\UseCase\ReadLocaleUseCase;
use SIMBA3\Component\Application\Variable\Request\ReadAllAreaTypeAreaRequest;
use SIMBA3\Component\Application\Variable\UseCase\ReadAllAreaTypeAreaUseCase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ReadAllAreaTypeAreaController
{
    private ReadAllAreaTypeAreaUseCase $readAreaTypeAreaUseCase;
    private ReadLocaleUseCase $readLocaleUseCase;

    public function __construct(
        ReadLocaleUseCase $readLocaleUseCase,
        ReadAllAreaTypeAreaUseCase $readAreaTypeAreaUseCase
    ){
        $this->readAreaTypeAreaUseCase = $readAreaTypeAreaUseCase;
        $this->readLocaleUseCase = $readLocaleUseCase;
    }

    public function execute(Request $request, int $typeAreaId): Response
    {
        try {
            $readLocaleResponse = $this->readLocaleUseCase->execute(new ReadLocaleRequest($request->getLocale()));

            $areaTypeAreaResponse = $this->readAreaTypeAreaUseCase->execute(new ReadAllAreaTypeAreaRequest($readLocaleResponse->getLocale(), $typeAreaId));
            return new JsonResponse($areaTypeAreaResponse->getAllArea(), Response::HTTP_OK);

        } catch (\InvalidArgumentException $exception) {

            return new Response("", Response::HTTP_NOT_FOUND);
        }
    }
}