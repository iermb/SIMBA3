<?php

namespace Component\Domain\Value\Service;

use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Domain\Value\Entity\YearValue;
use SIMBA3\Component\Domain\Value\Service\YearTypeValueArray;

class YearTypeValueArrayTest extends TestCase
{
    private YearTypeValueArray $yearTypeValueArray;
    private YearValue          $yearValue1;
    private YearValue          $yearValue2;

    /** @test */
    public function shouldYearTypeValueArrayWithoutYearValueReturnEmptyArray(): void
    {
        $this->givenAYearTypeValueArrayWithoutYearValue();
        $this->thenReturnAnEmptyArray();
    }

    private function givenAYearTypeValueArrayWithoutYearValue(): void
    {
        $this->yearTypeValueArray = new YearTypeValueArray([]);
    }

    private function thenReturnAnEmptyArray(): void
    {
        $this->assertEquals([], $this->yearTypeValueArray->getValuesAsArray());
        $this->assertEquals([], $this->yearTypeValueArray->getValues());

    }

    /** @test */
    public function shouldYearTypeValueArrayWithOneYearValueReturnOneElement(): void
    {
        $this->givenAYearTypeValueArrayWithOneYearValue();
        $this->givenAYearValue1();
        $this->thenReturnOneElement();
    }

    private function givenAYearTypeValueArrayWithOneYearValue(): void
    {
        $this->yearTypeValueArray = new YearTypeValueArray([$this->yearValue1]);
    }

    private function givenAYearValue1(): void
    {
        $this->yearValue1->method("getIndicatorId")->willReturn(1001);
        $this->yearValue1->method("getYear")->willReturn(2020);
        $this->yearValue1->method("getValue")->willReturn(34.5);
    }

    private function thenReturnOneElement(): void
    {
        $this->assertEquals([[1001, 2020, 34.5]], $this->yearTypeValueArray->getValuesAsArray());
        $this->assertEquals([$this->yearValue1], $this->yearTypeValueArray->getValues());
    }

    /** @test */
    public function shouldYearTypeValueArrayWithTwoYearValueReturnTwoElements(): void
    {
        $this->givenAYearTypeValueArrayWithTwoYearValue();
        $this->givenAYearValue1();
        $this->givenAYearValue2();
        $this->thenReturnTwoElements();
    }

    private function givenAYearTypeValueArrayWithTwoYearValue(): void
    {
        $this->yearTypeValueArray = new YearTypeValueArray([$this->yearValue1, $this->yearValue2]);
    }

    private function givenAYearValue2(): void
    {
        $this->yearValue2->method("getIndicatorId")->willReturn(1001);
        $this->yearValue2->method("getYear")->willReturn(2019);
        $this->yearValue2->method("getValue")->willReturn(453.21);
    }

    private function thenReturnTwoElements(): void
    {
        $this->assertEquals([[1001, 2020, 34.5], [1001, 2019, 453.21]], $this->yearTypeValueArray->getValuesAsArray());
        $this->assertEquals([$this->yearValue1, $this->yearValue2], $this->yearTypeValueArray->getValues());
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->yearValue1 = $this->createMock(YearValue::class);
        $this->yearValue2 = $this->createMock(YearValue::class);
    }
}
