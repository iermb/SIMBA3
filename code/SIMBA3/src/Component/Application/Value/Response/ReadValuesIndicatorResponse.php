<?php


namespace SIMBA3\Component\Application\Value\Response;


use SIMBA3\Component\Domain\Value\Entity\TypeValueArray;

class ReadValuesIndicatorResponse
{
    private TypeValueArray $responseTypeValue;

    public function __construct(TypeValueArray $responseTypeValue)
    {
        $this->responseTypeValue = $responseTypeValue;
    }

    public function getValuesAsArray(): array
    {
        return $this->responseTypeValue->getValuesAsArray();
    }

}