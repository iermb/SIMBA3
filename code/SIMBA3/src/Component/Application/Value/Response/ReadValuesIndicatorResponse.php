<?php


namespace SIMBA3\Component\Application\Value\Response;


use SIMBA3\Component\Application\Indicator\Response\MetadataIndicatorResponse;
use SIMBA3\Component\Domain\Variable\Service\TypeDictionary;
use SIMBA3\Component\Domain\Variable\Service\TypeValueArray;

class ReadValuesIndicatorResponse
{
    private MetadataIndicatorResponse $metadataIndicatorResponse;
    private TypeValueArray    $typeValue;
    private array             $dictionaries;

    public function __construct(MetadataIndicatorResponse $metadataIndicatorResponse, array $dictionaries, TypeValueArray $typeValue)
    {
        $this->metadataIndicatorResponse = $metadataIndicatorResponse;
        $this->dictionaries = $dictionaries;
        $this->typeValue = $typeValue;
    }

    public function getValuesAsArray(): array
    {
        return $this->typeValue->getValuesAsArray();
    }

    public function getDictionariesAsArray(): array
    {
        return array_map(function (TypeDictionary $typeDictionary) {
            return $typeDictionary->getDictionaryValuesAsArray();
        }, $this->dictionaries);
    }

    public function getMetadataIndicatorAsArray(): array
    {
        return $this->metadataIndicatorResponse->getValuesAsArray();
    }
}