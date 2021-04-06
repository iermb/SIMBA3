<?php

namespace Component\Application\Value\Request;

use SIMBA3\Component\Application\Value\Request\ReadDictionaryVariablesRequest;
use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Domain\Value\Service\TypeValueArray;

class ReadDictionaryVariablesRequestTest extends TestCase
{
    private ReadDictionaryVariablesRequest $readDictionaryVariableRequest;
    private TypeValueArray $typeValueArray;

    protected function setUp(): void
    {
        parent::setUp();
        $this->typeValueArray = $this->createMock(TypeValueArray::class);
    }


    /** @test */
    public function shouldReadDictionaryVariableRequestReturnTypeAndTypeValueArray(): void
    {
        $this->givenAReadDictionaryVariableRequest();
        $this->thenReturnTypeAndTypeValueArray();
    }

    private function givenAReadDictionaryVariableRequest(): void
    {
        $this->readDictionaryVariableRequest = new ReadDictionaryVariablesRequest('it',"type", $this->typeValueArray);
    }

    private function thenReturnTypeAndTypeValueArray(): void
    {
        $this->assertEquals("it", $this->readDictionaryVariableRequest->getLocale());
        $this->assertEquals("type", $this->readDictionaryVariableRequest->getType());
        $this->assertSame($this->typeValueArray, $this->readDictionaryVariableRequest->getTypeValueArray());
    }


}
