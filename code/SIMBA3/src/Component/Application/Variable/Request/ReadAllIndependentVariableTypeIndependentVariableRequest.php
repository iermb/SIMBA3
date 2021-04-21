<?php


namespace SIMBA3\Component\Application\Variable\Request;


class ReadAllIndependentVariableTypeIndependentVariableRequest
{
    private int $typeIndependentVariableId;
    private string $locale;

    public function __construct(string $locale, int $typeIndependentVariableId)
    {
        $this->locale = $locale;
        $this->typeIndependentVariableId = $typeIndependentVariableId;
    }

    public function getLocale(): string
    {
        return $this->locale;
    }

    public function getTypeIndependentVariableCode(): int
    {
        return $this->typeIndependentVariableId;
    }
}