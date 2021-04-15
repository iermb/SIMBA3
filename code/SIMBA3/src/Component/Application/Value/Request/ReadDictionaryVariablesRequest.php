<?php


namespace SIMBA3\Component\Application\Value\Request;

use SIMBA3\Component\Domain\Indicator\Entity\TypeIndicator;
use SIMBA3\Component\Domain\Value\Service\TypeValueArray;

class ReadDictionaryVariablesRequest
{
    private string         $locale;
    private TypeIndicator         $type;
    private TypeValueArray $typeValueArray;

    public function __construct(string $locale, TypeIndicator $type, TypeValueArray $typeValueArray)
    {
        $this->locale = $locale;
        $this->type = $type;
        $this->typeValueArray = $typeValueArray;
    }

    public function getLocale(): string
    {
        return $this->locale;
    }

    public function getType(): TypeIndicator
    {
        return $this->type;
    }

    public function getTypeValueArray(): TypeValueArray
    {
        return $this->typeValueArray;
    }

}