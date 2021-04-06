<?php


namespace SIMBA3\Component\Application\Variable\Request;


use PHPUnit\Framework\TestCase;

class ReadAllIndependentVariableTypeIndependentVariableRequestTest extends TestCase
{
    private ReadAllIndependentVariableTypeIndependentVariableRequest $readAllIndependentVariableTypeIndependentVariableRequest;
    
    /** @test */
    public function shouldReadAllIndependentVariableTypeIndependentVariableRequestReturnTypeIndependentVariableId(): void
    {
        $this->givenReadAllIndependentVariableTypeIndependentVariableRequest();
        $this->thenReturnLocaleAndTypeIndependentVariableId();
    }

    private function givenReadAllIndependentVariableTypeIndependentVariableRequest(): void
    {
        $this->readAllIndependentVariableTypeIndependentVariableRequest = new ReadAllIndependentVariableTypeIndependentVariableRequest('ca',567);
    }

    private function thenReturnLocaleAndTypeIndependentVariableId(): void
    {
        $this->assertEquals(
            'ca',
            $this->readAllIndependentVariableTypeIndependentVariableRequest->getLocale()
        );
        $this->assertEquals(
            567,
            $this->readAllIndependentVariableTypeIndependentVariableRequest->getTypeIndependentVariableId()
        );
    }
}