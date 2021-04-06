<?php


namespace SIMBA3\Component\Application\Variable\Request;


use PHPUnit\Framework\TestCase;

class ReadAllTypeIndependentVariableRequestTest extends TestCase
{
    private ReadAllTypeIndependentVariableRequest $readAllTypeIndependentVariableRequest;

    /** @test */
    public function shouldReadAllTypeIndependentVariableRequestReturnLocale(): void
    {
        $this->givenReadAllTypeIndependentVariableRequest();
        $this->thenReturnLocale();
    }

    private function givenReadAllTypeIndependentVariableRequest(): void
    {
        $this->readAllTypeIndependentVariableRequest = new ReadAllTypeIndependentVariableRequest('kr');
    }

    private function thenReturnLocale(): void
    {
        $this->assertEquals('kr', $this->readAllTypeIndependentVariableRequest->getLocale());
    }

}