<?php

namespace SIMBA3\Component\Domain\Variable\Entity;

use PHPUnit\Framework\TestCase;

class IndependentVariableTest extends TestCase
{
    private TypeIndependentVariable $typeIndependentVariable;
    private IndependentVariable $independentVariable;

    protected function setUp(): void
    {
        parent::setUp();
        $this->typeIndependentVariable = $this->createMock(TypeIndependentVariable::class);
    }

    /** @test */
    public function shouldIndependentVariableReturnAttributes(): void
    {
            $this->givenIndependentVariable();
            $this->thenReturnValidIndependentVariable();
    }

    private function givenIndependentVariable(): void
    {
        $this->independentVariable = new IndependentVariable(
            24,
            $this->typeIndependentVariable,
            'nom'
        );
    }

    private function thenReturnValidIndependentVariable(): void
    {
        $this->assertEquals($this->typeIndependentVariable, $this->independentVariable->getType());
        $this->assertEquals('nom', $this->independentVariable->getName());
        $this->assertEquals(24, $this->independentVariable->getCode());
    }
}