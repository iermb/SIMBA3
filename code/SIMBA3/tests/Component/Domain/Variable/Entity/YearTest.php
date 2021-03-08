<?php

namespace SIMBA3\Component\Domain\Variable\Entity;

use PHPUnit\Framework\TestCase;

class YerTest extends TestCase
{
    private Year $year;

    /** @test */
    public function shouldYearReturnAtributes()
    {
            $this->givenYear();
            $this->thenReturnValidYear();
    }

    private function givenYear()
    {
        $this->year = new Year(2021);
    }

    private function thenReturnValidYear()
    {
        $this->assertEquals(2021, $this->year->getYear());
        $this->assertEquals(2021, $this->year->getId());
    }
}