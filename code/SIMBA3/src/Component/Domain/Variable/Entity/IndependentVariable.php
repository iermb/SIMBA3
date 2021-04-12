<?php

namespace SIMBA3\Component\Domain\Variable\Entity;

class IndependentVariable
{
    private int $code;
    private TypeIndependentVariable $typeIndependentVariable;
    private string $name;

    public function __construct(
        int $code,
        TypeIndependentVariable $typeIndependentVariable,
        string $name
    ) {
        $this->code = $code;
        $this->typeIndependentVariable = $typeIndependentVariable;
        $this->name = $name;
    }

    public function getCode(): int
    {
        return $this->code;
    }

    public function getType(): TypeIndependentVariable
    {
        return $this->typeIndependentVariable;
    }

    public function getName(): string
    {
        return $this->name;
    }
}