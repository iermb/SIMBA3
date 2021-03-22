<?php


namespace SIMBA3\Api\Controller\Variable;


use SIMBA3\Component\Application\Locale\Request\ReadLocaleRequest;
use SIMBA3\Component\Application\Locale\Response\ReadLocaleResponse;
use SIMBA3\Component\Application\Locale\UseCase\ReadLocaleUseCase;
use SIMBA3\Component\Application\Variable\Request\ReadAllTypeAreaRequest;
use SIMBA3\Component\Application\Variable\UseCase\ReadAllTypeAreaUseCase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ReadAllTypeAreaController
{
    private ReadAllTypeAreaUseCase $readAllTypeAreaUseCase;
    private ReadLocaleUseCase $readLocaleUseCase;

    public function __construct(
        ReadLocaleUseCase $readLocaleUseCase,
        ReadAllTypeAreaUseCase $readAllTypeAreaUseCase
    ) {
        $this->readAllTypeAreaUseCase = $readAllTypeAreaUseCase;
        $this->readLocaleUseCase = $readLocaleUseCase;
    }

    public function execute(Request $request): Response
    {
        $indicatorResponse = $this->readAllTypeAreaUseCase->execute(new ReadAllTypeAreaRequest($request->getLocale()));

        return new JsonResponse($indicatorResponse->getAllTypeArea(), Response::HTTP_OK);
    }
}