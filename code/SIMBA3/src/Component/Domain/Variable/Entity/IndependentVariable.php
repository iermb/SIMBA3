<?php

namespace SIMBA3\Component\Domain\Variable\Entity;

class IndependentVariable
{
    public const INDEPENDENT_VARIABLE_ID_FIELD = "independentVariableId";

    private int $id;
    private TypeIndependentVariable $typeIndependentVariable;
    private string $name;
    private string $language;

    public function __construct(
        TypeIndependentVariable $typeIndependentVariable,
        string $name,
        string $language
    ) {
        $this->typeIndependentVariable = $typeIndependentVariable;
        $this->name = $name;
        $this->language = $language;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getType(): TypeIndependentVariable
    {
        return $this->typeIndependentVariable;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLanguage(): string
    {
        return $this->language;
    }
}