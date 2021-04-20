<?php

namespace SIMBA3\Component\Application\Value\Response;

use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Application\Indicator\Response\MetadataIndicatorResponse;
use SIMBA3\Component\Domain\Variable\Service\TypeDictionary;
use SIMBA3\Component\Domain\Variable\Service\TypeValueArray;

class ReadValuesIndicatorResponseTest extends TestCase
{
    private ReadValuesIndicatorResponse $readValuesIndicatorResponse;
    private MetadataIndicatorResponse           $metadataIndicator;
    private TypeValueArray              $typeValueArray;
    private TypeDictionary              $typeDictionary1;
    private TypeDictionary              $typeDictionary2;
    private array                       $dictionaries;

    /** @test */
    public function shouldReadValuesIndicatorResponseReturnTypeValuesAsArray(): void
    {
        $this->givenAMetadataIndicator();
        $this->givenArrayOfDictionaries();
        $this->givenATypeValueArray();
        $this->givenAReadValuesIndicatorResponse();
        $this->thenReturnDictionariesAsArrayValuesAsArrayAndMetadataIndicatorAsArray();
    }

    private function givenAReadValuesIndicatorResponse(): void
    {
        $this->readValuesIndicatorResponse = new ReadValuesIndicatorResponse(
            $this->metadataIndicator,
            $this->dictionaries,
            $this->typeValueArray
        );
    }

    private function givenATypeValueArray(): void
    {
        $this->typeValueArray->method("getValuesAsArray")->willReturn(
            [[33, 45, 344.5, "hello"], [3, 6, 8, 55.3, "bye"]]
        );
    }

    private function givenArrayOfDictionaries(): void
    {
        $this->typeDictionary1->method('getDictionaryValuesAsArray')->willReturn([1,2,3,4,5]);
        $this->typeDictionary2->method('getDictionaryValuesAsArray')->willReturn([6,7,8,9,10]);

        $this->dictionaries = [
            $this->typeDictionary1,
            $this->typeDictionary2,
        ];
    }

    private function givenAMetadataIndicator(): void
    {
        $this->metadataIndicator->method("getValuesAsArray")->willReturn([11,12,13,14,15]);
    }

    private function thenReturnDictionariesAsArrayValuesAsArrayAndMetadataIndicatorAsArray(): void
    {
        $this->assertEquals(
            [[33, 45, 344.5, "hello"], [3, 6, 8, 55.3, "bye"]],
            $this->readValuesIndicatorResponse->getValuesAsArray()
        );

        $this->assertEquals(
            [
                [1,2,3,4,5],
                [6,7,8,9,10],
            ],
            $this->readValuesIndicatorResponse->getDictionariesAsArray()
        );

        $this->assertEquals(
            [11,12,13,14,15],
            $this->readValuesIndicatorResponse->getMetadataIndicatorAsArray()
        );
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->typeValueArray = $this->createMock(TypeValueArray::class);
        $this->metadataIndicator = $this->createMock(MetadataIndicatorResponse::class);
        $this->typeDictionary1 = $this->createMock(TypeDictionary::class);
        $this->typeDictionary2 = $this->createMock(TypeDictionary::class);
    }
}
