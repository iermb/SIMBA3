<?php

namespace Component\Domain\Variable\Service;

use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Domain\Variable\Service\MonthDictionary;
use SIMBA3\Component\Domain\Variable\Entity\Month;

class MonthDictionaryTest extends TestCase
{
    private MonthDictionary $monthDictionary;
    private Month $month1;
    private Month $month2;
    private Month $month3;

    protected function setUp(): void
    {
        parent::setUp();
        $this->month1 = $this->createMock(Month::class);
        $this->month2 = $this->createMock(Month::class);
        $this->month3 = $this->createMock(Month::class);
    }

    /** @test */
    public function shouldMonthDictionaryReturnDictionaryMonthAsArray(): void
    {
        $this->givenAMonthDictionary();
        $this->thenReturnDictionaryMonthsAsArray();
    }

    private function givenAMonthDictionary(): void
    {
        $this->month1->method('getId')->willReturn(1);
        $this->month1->method('getName')->willReturn('Enero');
        $this->month2->method('getId')->willReturn(8);
        $this->month2->method('getName')->willReturn('Agosto');
        $this->month3->method('getId')->willReturn(11);
        $this->month3->method('getName')->willReturn('Noviembre');

        $this->monthDictionary = new MonthDictionary([$this->month1,$this->month2, $this->month3]);
    }

    private function thenReturnDictionaryMonthsAsArray(): void
    {
        $this->assertEquals([
            ["monthId" => 1, "monthName" => 'Enero'],
            ["monthId" => 8, "monthName" => 'Agosto'],
            ["monthId" => 11, "monthName" => 'Noviembre']
        ], $this->monthDictionary->getDictionaryValuesAsArray());
    }
}
