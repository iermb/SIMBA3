<?php

namespace SIMBA3\Component\Domain\Value\Service;

use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Domain\Value\Entity\AreaIndependentVariable1YearValue;

class AreaIndependentVariable1YearTypeValueUniqueIdsTest extends TestCase
{
    private AreaIndependentVariable1YearTypeValueUniqueIds $areaIndependentVariable1YearTypeValueUniqueIds;
    private TypeValueArray $typeValueArray;
    private AreaIndependentVariable1YearValue $areaIndependentVariable1YearValue1;
    private AreaIndependentVariable1YearValue $areaIndependentVariable1YearValue2;
    private AreaIndependentVariable1YearValue $areaIndependentVariable1YearValue3;

    /** @test */
    public function shouldAreaIndependentVariable1YearTypeValueUniqueIdsReturnAreaIndependentVariable2YearArraysWithUniqueIds()
    {
        $this->givenAreaIndependentVariable1YearTypeValueUniqueIdsWithRepeatedValues();
        $this->thenReturnArraysWithUniqueIds();
    }

    private function givenAreaIndependentVariable1YearTypeValueUniqueIdsWithRepeatedValues()
    {
        $this->areaIndependentVariable1YearTypeValueUniqueIds = new AreaIndependentVariable1YearTypeValueUniqueIds($this->typeValueArray);

        $this->typeValueArray->method("getValues")->willReturn([
            $this->areaIndependentVariable1YearValue1,
            $this->areaIndependentVariable1YearValue2,
            $this->areaIndependentVariable1YearValue3
        ]);

        $this->areaIndependentVariable1YearValue1->method("getTypeAreaCode")->willReturn(101);
        $this->areaIndependentVariable1YearValue1->method("getAreaCode")->willReturn(2);
        $this->areaIndependentVariable1YearValue1->method("getTypeIndependentVariable1Code")->willReturn(205);
        $this->areaIndependentVariable1YearValue1->method("getIndependentVariable1Code")->willReturn(7);
        $this->areaIndependentVariable1YearValue1->method("getYear")->willReturn(2020);

        $this->areaIndependentVariable1YearValue2->method("getTypeAreaCode")->willReturn(101);
        $this->areaIndependentVariable1YearValue2->method("getAreaCode")->willReturn(2);
        $this->areaIndependentVariable1YearValue2->method("getTypeIndependentVariable1Code")->willReturn(206);
        $this->areaIndependentVariable1YearValue2->method("getIndependentVariable1Code")->willReturn(7);
        $this->areaIndependentVariable1YearValue2->method("getYear")->willReturn(2019);

        $this->areaIndependentVariable1YearValue3->method("getTypeAreaCode")->willReturn(102);
        $this->areaIndependentVariable1YearValue3->method("getAreaCode")->willReturn(2);
        $this->areaIndependentVariable1YearValue3->method("getTypeIndependentVariable1Code")->willReturn(206);
        $this->areaIndependentVariable1YearValue3->method("getIndependentVariable1Code")->willReturn(7);
        $this->areaIndependentVariable1YearValue3->method("getYear")->willReturn(2019);
    }

    private function thenReturnArraysWithUniqueIds()
    {
        $this->assertEquals(
            [
                ['typeAreaCode' => 101, 'areaCode' => 2],
                ['typeAreaCode' => 102, 'areaCode' => 2],
            ],
            $this->areaIndependentVariable1YearTypeValueUniqueIds->getAreaUniqueCodes()
        );

        $this->assertEquals(
            [
                ['typeIndependentVariableCode' => 205, 'independentVariableCode' => 7],
                ['typeIndependentVariableCode' => 206, 'independentVariableCode' => 7],
            ],
            $this->areaIndependentVariable1YearTypeValueUniqueIds->getIndependentVariable1Codes()
        );

        $this->assertEquals(
            [
                ['yearId' => 2020],
                ['yearId' => 2019],
            ],
            $this->areaIndependentVariable1YearTypeValueUniqueIds->getYearUniqueIds()
        );
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->typeValueArray = $this->createMock(TypeValueArray::class);
        $this->areaIndependentVariable1YearValue1 = $this->createMock(AreaIndependentVariable1YearValue::class);
        $this->areaIndependentVariable1YearValue2 = $this->createMock(AreaIndependentVariable1YearValue::class);
        $this->areaIndependentVariable1YearValue3 = $this->createMock(AreaIndependentVariable1YearValue::class);
    }

}