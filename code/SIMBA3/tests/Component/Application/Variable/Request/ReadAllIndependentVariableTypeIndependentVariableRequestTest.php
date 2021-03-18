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
        $this->thenReturnTypeIndependentVariableId();
    }

    private function givenReadAllIndependentVariableTypeIndependentVariableRequest(): void
    {
        $this->readAllIndependentVariableTypeIndependentVariableRequest = new ReadAllIndependentVariableTypeIndependentVariableRequest(567);
    }

    private function thenReturnTypeIndependentVariableId(): void
    {
        $this->assertEquals(
            567,
            $this->readAllIndependentVariableTypeIndependentVariableRequest->getTypeIndependentVariableId()
        );
    }
}