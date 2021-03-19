<?php

namespace SIMBA3\Component\Domain\Variable\Entity;

use PHPUnit\Framework\TestCase;

class TypeAreaTest extends TestCase
{
    private TypeArea $typeArea;

    /** @test */
    public function shouldAreaReturnAtributes()
    {
            $this->givenArea();
            $this->thenReturnValidArea();
    }

    private function givenArea()
    {
        $this->typeArea = new TypeArea(
            'name',
            'en'
        );
    }

    private function thenReturnValidArea()
    {
        $this->assertEquals('name', $this->typeArea->getName());
        $this->assertEquals('en', $this->typeArea->getLocale());
    }
}