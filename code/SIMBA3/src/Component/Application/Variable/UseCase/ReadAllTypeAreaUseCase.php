<?php


namespace SIMBA3\Component\Application\Variable\UseCase;


use SIMBA3\Component\Application\Variable\Request\ReadAllTypeAreaRequest;
use SIMBA3\Component\Application\Variable\Response\ReadAllTypeAreaResponse;
use SIMBA3\Component\Domain\Variable\Repository\TypeAreaRepository;

class ReadAllTypeAreaUseCase
{
    private TypeAreaRepository $typeAreaRepository;

    public function __construct(TypeAreaRepository $typeAreaRepository)
    {
        $this->typeAreaRepository = $typeAreaRepository;
    }

    public function execute(ReadAllTypeAreaRequest $readAllTypeAreaRequest): ReadAllTypeAreaResponse
    {
        return new ReadAllTypeArearesponse($this->typeAreaRepository->getAllTypeArea($readAllTypeAreaRequest->getLocale()));
    }
}