<?php


namespace SIMBA3\Component\Domain\Variable\Entity;


use PHPUnit\Framework\TestCase;

class MonthTest extends TestCase
{
    private Month $month;

    /** @test */
    public function shouldMonthReturnAttributes()
    {
        $this->givenMonth();
        $this->thenReturnValidMonth();
    }

    private function givenMonth()
    {
        $this->month = new Month(980, 'Month name');
    }

    private function thenReturnValidMonth()
    {
        $this->assertEquals(
            980,
            $this->month->getId()
        );

        $this->assertEquals(
            'Month name',
            $this->month->getMonth()
        );
    }
}