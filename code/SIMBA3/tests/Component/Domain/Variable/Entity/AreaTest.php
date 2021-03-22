<?php

namespace SIMBA3\Component\Domain\Variable\Entity;

use PHPUnit\Framework\TestCase;

class AreaTest extends TestCase
{
    private TypeArea $typeArea;
    private Area $area;

    protected function setUp(): void
    {
        parent::setUp();
        $this->typeArea = $this->createMock(TypeArea::class);
    }

    /** @test */
    public function ShouldAreaReturnAtributes()
    {
            $this->givenArea();
            $this->thenReturnValidArea();
    }

    private function givenArea()
    {
        $this->area = new Area(
            $this->typeArea,
            'name'
        );
    }

    private function thenReturnValidArea()
    {
        $this->assertEquals($this->typeArea, $this->area->getType());
        $this->assertEquals('name', $this->area->getName());
    }
}