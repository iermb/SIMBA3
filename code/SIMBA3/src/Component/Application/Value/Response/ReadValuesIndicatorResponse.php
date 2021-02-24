<?php


namespace SIMBA3\Component\Application\Value\Response;


use SIMBA3\Component\Domain\Value\Service\TypeValueArray;

class ReadValuesIndicatorResponse
{
    private TypeValueArray $responseTypeValue;
    private array $dictionaries;

    public function __construct(array $dictionaries, TypeValueArray $responseTypeValue)
    {
        $this->dictionaries = $dictionaries;
        $this->responseTypeValue = $responseTypeValue;
    }

    public function getValuesAsArray(): array
    {
        return $this->responseTypeValue->getValuesAsArray();
    }

    public function getDictionaries(): array
    {
        return $this->dictionaries;
    }
}