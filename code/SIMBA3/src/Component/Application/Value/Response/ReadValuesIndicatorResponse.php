<?php


namespace SIMBA3\Component\Application\Value\Response;


use SIMBA3\Component\Domain\Indicator\Service\MetadataIndicator;
use SIMBA3\Component\Domain\Value\Service\TypeDictionary;
use SIMBA3\Component\Domain\Value\Service\TypeValueArray;

class ReadValuesIndicatorResponse
{
    private MetadataIndicator      $metadataIndicator;
    private TypeValueArray $responseTypeValue;
    private array          $dictionaries;

    public function __construct(MetadataIndicator $metadataIndicator, array $dictionaries, TypeValueArray $responseTypeValue)
    {
        $this->metadataIndicator = $metadataIndicator;
        $this->dictionaries = $dictionaries;
        $this->responseTypeValue = $responseTypeValue;
    }

    public function getValuesAsArray(): array
    {
        return $this->responseTypeValue->getValuesAsArray();
    }

    public function getDictionariesAsArray(): array
    {
        return array_map(function (TypeDictionary $typeDictionary) {
            return $typeDictionary->getDictionaryValuesAsArray();
        }, $this->dictionaries);
    }

    public function getMetadataIndicatorAsArray(): array
    {
        return $this->metadataIndicator->getValuesAsArray();
    }
}