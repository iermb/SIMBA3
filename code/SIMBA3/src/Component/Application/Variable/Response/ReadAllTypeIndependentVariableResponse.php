<?php


namespace SIMBA3\Component\Application\Variable\Response;


use SIMBA3\Component\Domain\Variable\Entity\TypeArea;
use SIMBA3\Component\Domain\Variable\Entity\TypeIndependentVariable;

class ReadAllTypeIndependentVariableResponse
{
    private const ID_FIELD = "id";
    private const NAME_FIELD = "name";

    private array $typeIndependentVariableArray;

    public function __construct(array $typeIndependentVariableArray)
    {
        $this->typeIndependentVariableArray = $typeIndependentVariableArray;
    }

    public function getAllTypeIndependentVariable(): array
    {
        return array_map(
            function(TypeIndependentVariable $typeIndependentVariable) {
                return [
                    self::ID_FIELD => $typeIndependentVariable->getId(),
                    self::NAME_FIELD => $typeIndependentVariable->getName(),
                ];
            },
            $this->typeIndependentVariableArray
        );
    }
}