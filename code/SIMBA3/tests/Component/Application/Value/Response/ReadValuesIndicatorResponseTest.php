<?php

namespace SIMBA3\Component\Application\Value\Response;

use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Domain\Value\Service\TypeValueArray;

class ReadValuesIndicatorResponseTest extends TestCase
{
    private ReadValuesIndicatorResponse $readValuesIndicatorResponse;
    private TypeValueArray              $typeValueArray;
    private array                       $dictionaries;

    /** @test */
    public function shouldReadValuesIndicatorResponseReturnTypeValuesAsArray(): void
    {
        $this->givenAReadValuesIndicatorResponse();
        $this->givenATypeValueArray();
        $this->thenReturnDictionariesAndAnArray();
    }

    private function givenAReadValuesIndicatorResponse(): void
    {
        $this->readValuesIndicatorResponse = new ReadValuesIndicatorResponse($this->dictionaries, $this->typeValueArray);
    }

    private function givenATypeValueArray(): void
    {
        $this->typeValueArray->method("getValuesAsArray")->willReturn(
            [[33, 45, 344.5, "hello"], [3, 6, 8, 55.3, "bye"]]
        );
    }

    private function thenReturnDictionariesAndAnArray(): void
    {
        $this->assertEquals(
            [[33, 45, 344.5, "hello"], [3, 6, 8, 55.3, "bye"]],
            $this->readValuesIndicatorResponse->getValuesAsArray()
        );
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->typeValueArray = $this->createMock(TypeValueArray::class);
        $this->dictionaries = array();
    }
}
