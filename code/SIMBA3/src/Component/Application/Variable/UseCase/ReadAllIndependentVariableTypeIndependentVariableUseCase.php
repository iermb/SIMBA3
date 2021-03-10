<?php


namespace SIMBA3\Component\Application\Variable\UseCase;


use SIMBA3\Component\Application\Variable\Request\ReadAllIndependentVariableTypeIndependentVariableRequest;
use SIMBA3\Component\Application\Variable\Response\ReadAllIndependentVariableTypeIndependentVariableResponse;
use SIMBA3\Component\Domain\Variable\Repository\IndependentVariableRepository;
use SIMBA3\Component\Domain\Variable\Repository\TypeIndependentVariableRepository;

class ReadAllIndependentVariableTypeIndependentVariableUseCase
{
    private TypeIndependentVariableRepository $typeIndependentVariableRepository;
    private IndependentVariableRepository $independentVariableRepository;

    public function __construct(
        TypeIndependentVariableRepository $typeIndependentVariableRepository,
        IndependentVariableRepository $independentVariableRepository
    ){
        $this->typeIndependentVariableRepository = $typeIndependentVariableRepository;
        $this->independentVariableRepository = $independentVariableRepository;
    }

    public function execute(
        ReadAllIndependentVariableTypeIndependentVariableRequest $independentVariableTypeindependentVariableRequest
    ): ReadAllIndependentVariableTypeIndependentVariableResponse
    {
        $typeIndependentVariable = $this->typeIndependentVariableRepository->getTypeIndependentVariable($independentVariableTypeindependentVariableRequest->getTypeIndependentVariableId());
        if (!$typeIndependentVariable) {
            throw new \InvalidArgumentException("typeIndependentVariable not exists");
        }

        $areas = $this->independentVariableRepository->getAllIndependentVariableByTypeIndependentVariable($typeIndependentVariable->getId());
        return new ReadAllIndependentVariableTypeIndependentVariableResponse($areas);
    }
}