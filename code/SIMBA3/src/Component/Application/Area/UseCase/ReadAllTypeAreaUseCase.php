<?php


namespace SIMBA3\Component\Application\Area\UseCase;


use SIMBA3\Component\Application\Area\Response\ReadAllTypeAreaResponse;
use SIMBA3\Component\Domain\Area\Repository\TypeAreaRepository;

class ReadAllTypeAreaUseCase
{
    private TypeAreaRepository $typeAreaRepository;

    public function __construct(TypeAreaRepository $typeAreaRepository)
    {
        $this->typeAreaRepository = $typeAreaRepository;
    }

    public function execute(): ReadAllTypeAreaResponse
    {
        return new ReadAllTypeArearesponse($this->typeAreaRepository->getAllTypeArea());
    }
}