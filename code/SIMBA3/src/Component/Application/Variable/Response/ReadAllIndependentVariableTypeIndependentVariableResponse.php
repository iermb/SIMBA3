<?php


namespace SIMBA3\Component\Application\Variable\Response;


use SIMBA3\Component\Domain\Variable\Entity\IndependentVariable;

class ReadAllIndependentVariableTypeIndependentVariableResponse
{
    private const ID_FIELD = "id";
    private const NAME_FIELD = "name";
    private const TYPE_NAME_FIELD = "type_name";

    private array $independentVariableArray;

    public function __construct(array $independentVariableArray)
    {
        $this->independentVariableArray = $independentVariableArray;
    }

    public function getAllIndependentVariable(): array
    {
        return array_map(
            function(IndependentVariable $independentVariable) {
                return [
                    self::ID_FIELD => $independentVariable->getCode(),
                    self::NAME_FIELD => $independentVariable->getName(),
                    self::TYPE_NAME_FIELD => $independentVariable->getType()->getName(),
                ];
            },
            $this->independentVariableArray
        );
    }
}