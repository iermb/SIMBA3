<?php


namespace SIMBA3\Component\Application\Value\Response;


use SIMBA3\Component\Domain\Indicator\Service\MetadataIndicator;
use SIMBA3\Component\Domain\Value\Service\TypeDictionary;
use SIMBA3\Component\Domain\Value\Service\TypeValueArray;

class ReadValuesIndicatorResponse
{
    private MetadataIndicator $metadataIndicator;
    private TypeValueArray    $typeValue;
    private array             $dictionaries;

    public function __construct(MetadataIndicator $metadataIndicator, array $dictionaries, TypeValueArray $typeValue)
    {
        $this->metadataIndicator = $metadataIndicator;
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
        return $this->metadataIndicator->getValuesAsArray();
    }
}