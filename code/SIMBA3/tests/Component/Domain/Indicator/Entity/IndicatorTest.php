<?php

namespace SIMBA3\Component\Domain\Indicator\Entity;

use PHPUnit\Framework\TestCase;

class IndicatorTest extends TestCase
{
    private Indicator $indicator;

    /** @test */
    public function shouldReturnIndicatorValues()
    {
        $this->givenAIndicator();
        $this->thenReturnValidInfoIndicator();
    }

    private function givenAIndicator()
    {
        $this->indicator = new Indicator(
            "Test name",
            "Test description",
            "units",
            "note",
            "font",
            "Test methodology",
            2,
            1
        );
    }

    private function thenReturnValidInfoIndicator()
    {
        $this->assertEquals("Test name", $this->indicator->getName());
        $this->assertEquals("Test description", $this->indicator->getDescription());
        $this->assertEquals("units", $this->indicator->getUnits());
        $this->assertEquals("note", $this->indicator->getNote());
        $this->assertEquals("font", $this->indicator->getFont());
        $this->assertEquals("Test methodology", $this->indicator->getMethodology());
    }
}
