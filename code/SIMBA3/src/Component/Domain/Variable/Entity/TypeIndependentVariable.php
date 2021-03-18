<?php

namespace SIMBA3\Component\Domain\Variable\Entity;

class TypeIndependentVariable
{
    public const TYPE_INDEPENDENT_VARIABLE_ID_FIELD = "typeIndependentVariableId";

    private int $id;
    private string $name;
    private string $language;

    public function __construct(
        string $name,
        string $language
    ) {
        $this->name = $name;
        $this->language = $language;
    }

    public function getId(): int
    {
        return $this->id;
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