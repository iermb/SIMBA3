<?php

namespace SIMBA3\Component\Application\Variable\UseCase;

use SIMBA3\Component\Application\Variable\Response\ReadAllTypeIndependentVariableResponse;
use SIMBA3\Component\Domain\Variable\Repository\TypeIndependentVariableRepository;

class ReadAllTypeIndependentVariableUseCase
{
    private TypeIndependentVariableRepository $typeIndependentVariableRepository;

    public function __construct(TypeIndependentVariableRepository $typeIndependentVariableRepository)
    {
        $this->typeIndependentVariableRepository = $typeIndependentVariableRepository;
    }

    public function execute(): ReadAllTypeIndependentVariableResponse
    {
        return new ReadAllTypeIndependentVariableResponse($this->typeIndependentVariableRepository->getAllTypeIndependentVariable());
    }
}