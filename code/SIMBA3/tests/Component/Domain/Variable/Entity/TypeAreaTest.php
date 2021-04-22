<?php

namespace SIMBA3\Component\Domain\Variable\Entity;

use PHPUnit\Framework\TestCase;

class TypeAreaTest extends TestCase
{
    private TypeArea $typeArea;

    /** @test */
    public function shouldAreaReturnAttributes()
    {
            $this->givenArea();
            $this->thenReturnValidArea();
    }

    private function givenArea()
    {
        $this->typeArea = new TypeArea(
            'en',
            200,
            'City'
        );
    }

    private function thenReturnValidArea()
    {
        $this->assertEquals(200, $this->typeArea->getCode());
        $this->assertEquals('City', $this->typeArea->getName());
        $this->assertEquals('en', $this->typeArea->getLanguage());
    }
}