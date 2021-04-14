<?php

namespace SIMBA3\Component\Application\Variable\UseCase;

use SIMBA3\Component\Application\Variable\Request\ReadAllTypeIndependentVariableRequest;
use SIMBA3\Component\Application\Variable\Response\ReadAllTypeIndependentVariableResponse;
use SIMBA3\Component\Domain\Variable\Repository\TypeIndependentVariableRepository;

class ReadAllTypeIndependentVariableUseCase
{
    private TypeIndependentVariableRepository $typeIndependentVariableRepository;

    public function __construct(TypeIndependentVariableRepository $typeIndependentVariableRepository)
    {
        $this->typeIndependentVariableRepository = $typeIndependentVariableRepository;
    }

    public function execute(ReadAllTypeIndependentVariableRequest $readAllTypeIndependentVariableRequest
    ): ReadAllTypeIndependentVariableResponse {
        return new ReadAllTypeIndependentVariableResponse($this->typeIndependentVariableRepository->getAllTypeIndependentVariable($readAllTypeIndependentVariableRequest->getLocale()));
    }
}