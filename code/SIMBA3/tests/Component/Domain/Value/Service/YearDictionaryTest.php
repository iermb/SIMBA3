<?php

namespace Component\Domain\Value\Service;

use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Domain\Value\Service\YearDictionary;

class YearDictionaryTest extends TestCase
{

    private YearDictionary $yearDictionary;

    /** @test */
    public function shouldYearDictionaryReturnDictionaryYearAsArray(): void
    {
        $this->givenAYearDictionary();
        $this->thenReturnDictionaryYearsAsArray();
    }

    private function givenAYearDictionary(): void
    {
        $this->yearDictionary = new YearDictionary([2018, 2019, 2020]);
    }

    private function thenReturnDictionaryYearsAsArray(): void
    {
        $this->assertEquals([
            ["yearId" => 2018, "yearName" => 2018],
            ["yearId" => 2019, "yearName" => 2019],
            ["yearId" => 2020, "yearName" => 2020]
        ], $this->yearDictionary->getDictionaryValuesAsArray());
    }
}
