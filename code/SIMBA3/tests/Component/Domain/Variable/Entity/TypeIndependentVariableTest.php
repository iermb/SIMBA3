<?php

namespace SIMBA3\Component\Domain\Variable\Entity;

use PHPUnit\Framework\TestCase;

class TypeIndependentVariableTest extends TestCase
{
    private TypeIndependentVariable $typeIndependentVariable;

    /** @test */
    public function shouldIndependentVariableReturnAttributes(): void
    {
            $this->givenIndependentVariable();
            $this->thenReturnValidIndependentVariable();
    }

    private function givenIndependentVariable(): void
    {
        $this->typeIndependentVariable = new TypeIndependentVariable(
            'nombre',
            'es'
        );
    }

    private function thenReturnValidIndependentVariable(): void
    {
        $this->assertEquals('nombre', $this->typeIndependentVariable->getName());
        $this->assertEquals('es', $this->typeIndependentVariable->getLanguage());
    }
}