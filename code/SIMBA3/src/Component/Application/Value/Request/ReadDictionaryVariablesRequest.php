<?php


namespace SIMBA3\Component\Application\Value\Request;

use SIMBA3\Component\Domain\Value\Service\TypeValueArray;

class ReadDictionaryVariablesRequest
{
    private string         $locale;
    private string         $type;
    private TypeValueArray $typeValueArray;

    public function __construct(string $locale, string $type, TypeValueArray $typeValueArray)
    {
        $this->locale = $locale;
        $this->type = $type;
        $this->typeValueArray = $typeValueArray;
    }

    public function getLocale(): string
    {
        return $this->locale;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getTypeValueArray(): TypeValueArray
    {
        return $this->typeValueArray;
    }

}