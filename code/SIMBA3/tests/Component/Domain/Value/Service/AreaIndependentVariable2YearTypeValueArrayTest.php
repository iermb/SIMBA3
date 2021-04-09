<?php

namespace SIMBA3\Component\Domain\Value\Service;

use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Domain\Value\Entity\AreaIndependentVariable2YearValue;

class AreaIndependentVariable2YearTypeValueArrayTest extends TestCase
{
    private AreaIndependentVariable2YearTypeValueArray $areaIndependentVariable2YearTypeValueArray;
    private AreaIndependentVariable2YearValue $areaIndependentVariable2YearValue1;
    private AreaIndependentVariable2YearValue $areaIndependentVariable2YearValue2;

    /** @test */
    public function shouldAreaIndependentVariable2YearTypeValueArrayWithoutAreaIndependentVariable2YearValueReturnEmptyArray(): void
    {
        $this->givenAreaIndependentVariable2YearTypeValueArrayWithoutAreaIndependentVariable2YearValue();
        $this->returnEmptyArray();
    }

    private function givenAreaIndependentVariable2YearTypeValueArrayWithoutAreaIndependentVariable2YearValue(): void
    {
        $this->areaIndependentVariable2YearTypeValueArray = new AreaIndependentVariable2YearTypeValueArray([]);
    }

    private function returnEmptyArray()
    {
        $this->assertEquals([], $this->areaIndependentVariable2YearTypeValueArray->getValuesAsArray());
        $this->assertEquals([], $this->areaIndependentVariable2YearTypeValueArray->getValues());
    }

    /** @test */
    public function shouldAreaIndependentVariable2YearTypeValueArrayWithOneAreaIndependentVariable2YearValueReturnReturnArrayWithOneValue(): void
    {
        $this->givenAreaIndependentVariable2YearTypeValueArrayWithOneAreaIndependentVariable2YearValue();
        $this->returnOneElementArray();
    }

    private function givenAreaIndependentVariable2YearTypeValueArrayWithOneAreaIndependentVariable2YearValue(): void
    {
        $this->createAreaIndependentVariable2YearValue();
        $this->areaIndependentVariable2YearTypeValueArray = new AreaIndependentVariable2YearTypeValueArray([$this->areaIndependentVariable2YearValue1]);
    }

    private function createAreaIndependentVariable2YearValue(): void
    {
        $this->areaIndependentVariable2YearValue1->method('getIndicatorId')->willReturn(1);
        $this->areaIndependentVariable2YearValue1->method('getTypeAreaCode')->willReturn(2);
        $this->areaIndependentVariable2YearValue1->method('getAreaCode')->willReturn(3);
        $this->areaIndependentVariable2YearValue1->method('getTypeIndependentVariable1Code')->willReturn(4);
        $this->areaIndependentVariable2YearValue1->method('getIndependentVariable1Code')->willReturn(5);
        $this->areaIndependentVariable2YearValue1->method('getTypeIndependentVariable2Code')->willReturn(6);
        $this->areaIndependentVariable2YearValue1->method('getIndependentVariable2Code')->willReturn(7);
        $this->areaIndependentVariable2YearValue1->method('getYear')->willReturn(8);
        $this->areaIndependentVariable2YearValue1->method('getValue')->willReturn(9.10);
    }

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->areaIndependentVariable2YearValue1 = $this->createMock(AreaIndependentVariable2YearValue::class);
        $this->areaIndependentVariable2YearValue2 = $this->createMock(AreaIndependentVariable2YearValue::class);
    }

    private function returnOneElementArray(): void
    {
        $this->assertEquals(
            [[ 1, 2, 3, 4, 5, 6, 7, 8, 9.10]],
            $this->areaIndependentVariable2YearTypeValueArray->getValuesAsArray()
        );

        $this->assertEquals([$this->areaIndependentVariable2YearValue1], $this->areaIndependentVariable2YearTypeValueArray->getValues());
    }

    /** @test */
    public function shouldAreaIndependentVariable2YearTypeValueArrayWithTwoAreaIndependentVariable2YearValueReturnReturnArrayWithTwoValues(): void
    {
        $this->givenAreaIndependentVariable2YearTypeValueArrayWithTwoAreaIndependentVariable2YearValue();
        $this->returnTwoElementArray();
    }

    private function givenAreaIndependentVariable2YearTypeValueArrayWithTwoAreaIndependentVariable2YearValue()
    {
        $this->createAreaIndependentVariable2YearValue();
        $this->areaIndependentVariable2YearValue2->method('getIndicatorId')->willReturn(11);
        $this->areaIndependentVariable2YearValue2->method('getTypeAreaCode')->willReturn(12);
        $this->areaIndependentVariable2YearValue2->method('getAreaCode')->willReturn(13);
        $this->areaIndependentVariable2YearValue2->method('getTypeIndependentVariable1Code')->willReturn(14);
        $this->areaIndependentVariable2YearValue2->method('getIndependentVariable1Code')->willReturn(15);
        $this->areaIndependentVariable2YearValue2->method('getTypeIndependentVariable2Code')->willReturn(16);
        $this->areaIndependentVariable2YearValue2->method('getIndependentVariable2Code')->willReturn(17);
        $this->areaIndependentVariable2YearValue2->method('getYear')->willReturn(18);
        $this->areaIndependentVariable2YearValue2->method('getValue')->willReturn(19.10);

        $this->areaIndependentVariable2YearTypeValueArray = new AreaIndependentVariable2YearTypeValueArray(
            [$this->areaIndependentVariable2YearValue1,$this->areaIndependentVariable2YearValue2]
        );
    }

    private function returnTwoElementArray()
    {
        $this->assertEquals(
            [
                [ 1, 2, 3, 4, 5, 6, 7, 8, 9.10],
                [ 11, 12, 13, 14, 15, 16, 17, 18, 19.10],
            ],
            $this->areaIndependentVariable2YearTypeValueArray->getValuesAsArray()
        );

        $this->assertEquals([$this->areaIndependentVariable2YearValue1,$this->areaIndependentVariable2YearValue2], $this->areaIndependentVariable2YearTypeValueArray->getValues());
    }
}