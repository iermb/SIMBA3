<?php

namespace SIMBA3\Component\Domain\Variable\Entity;

class TypeIndependentVariable
{
    private int $id;
    private int $code;
    private string $name;
    private string $language;

    public function __construct(
        string $code,
        string $name,
        string $language
    ) {
        $this->code = $code;
        $this->name = $name;
        $this->language = $language;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getCode(): int
    {
        return $this->code;
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