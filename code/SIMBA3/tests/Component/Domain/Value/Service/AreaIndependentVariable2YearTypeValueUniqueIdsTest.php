<?php

namespace SIMBA3\Component\Domain\Value\Service;

use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Domain\Value\Entity\AreaIndependentVariable2YearValue;

class AreaIndependentVariable2YearTypeValueUniqueIdsTest extends TestCase
{
    private AreaIndependentVariable2YearTypeValueUniqueIds $areaIndependentVariable2YearTypeValueUniqueIds;
    private TypeValueArray $typeValueArray;
    private AreaIndependentVariable2YearValue $areaIndependentVariable2YearValue1;
    private AreaIndependentVariable2YearValue $areaIndependentVariable2YearValue2;
    private AreaIndependentVariable2YearValue $areaIndependentVariable2YearValue3;

    /** @test */
    public function shouldAreaIndependentVariable2YearTypeValueUniqueIdsReturnAreaIndependentVariable2YearArraysWithUniqueIds()
    {
        $this->givenAreaIndependentVariable2YearTypeValueUniqueIdsWithRepeatedValues();
        $this->thenReturnArraysWithUniqueIds();
    }

    private function givenAreaIndependentVariable2YearTypeValueUniqueIdsWithRepeatedValues()
    {
        $this->areaIndependentVariable2YearTypeValueUniqueIds = new AreaIndependentVariable2YearTypeValueUniqueIds($this->typeValueArray);

        $this->typeValueArray->method("getValues")->willReturn([
            $this->areaIndependentVariable2YearValue1,
            $this->areaIndependentVariable2YearValue2,
            $this->areaIndependentVariable2YearValue3
        ]);

        $this->areaIndependentVariable2YearValue1->method("getTypeAreaCode")->willReturn(101);
        $this->areaIndependentVariable2YearValue1->method("getAreaCode")->willReturn(2);
        $this->areaIndependentVariable2YearValue1->method("getTypeIndependentVariable1Code")->willReturn(205);
        $this->areaIndependentVariable2YearValue1->method("getIndependentVariable1Code")->willReturn(7);
        $this->areaIndependentVariable2YearValue1->method("getTypeIndependentVariable2Code")->willReturn(308);
        $this->areaIndependentVariable2YearValue1->method("getIndependentVariable2Code")->willReturn(8);
        $this->areaIndependentVariable2YearValue1->method("getYear")->willReturn(2020);

        $this->areaIndependentVariable2YearValue2->method("getTypeAreaCode")->willReturn(101);
        $this->areaIndependentVariable2YearValue2->method("getAreaCode")->willReturn(2);
        $this->areaIndependentVariable2YearValue2->method("getTypeIndependentVariable1Code")->willReturn(206);
        $this->areaIndependentVariable2YearValue2->method("getIndependentVariable1Code")->willReturn(7);
        $this->areaIndependentVariable2YearValue2->method("getTypeIndependentVariable2Code")->willReturn(309);
        $this->areaIndependentVariable2YearValue2->method("getIndependentVariable2Code")->willReturn(9);
        $this->areaIndependentVariable2YearValue2->method("getYear")->willReturn(2019);

        $this->areaIndependentVariable2YearValue3->method("getTypeAreaCode")->willReturn(102);
        $this->areaIndependentVariable2YearValue3->method("getAreaCode")->willReturn(2);
        $this->areaIndependentVariable2YearValue3->method("getTypeIndependentVariable1Code")->willReturn(206);
        $this->areaIndependentVariable2YearValue3->method("getIndependentVariable1Code")->willReturn(7);
        $this->areaIndependentVariable2YearValue3->method("getTypeIndependentVariable2Code")->willReturn(308);
        $this->areaIndependentVariable2YearValue3->method("getIndependentVariable2Code")->willReturn(8);
        $this->areaIndependentVariable2YearValue3->method("getYear")->willReturn(2019);
    }

    private function thenReturnArraysWithUniqueIds()
    {
        $this->assertEquals(
            [
                ['typeAreaCode' => 101, 'areaCode' => 2],
                ['typeAreaCode' => 102, 'areaCode' => 2],
            ],
            $this->areaIndependentVariable2YearTypeValueUniqueIds->getAreaUniqueCodes()
        );

        $this->assertEquals(
            [
                ['typeIndependentVariableCode' => 205, 'independentVariableCode' => 7],
                ['typeIndependentVariableCode' => 206, 'independentVariableCode' => 7],
            ],
            $this->areaIndependentVariable2YearTypeValueUniqueIds->getIndependentVariable1Codes()
        );

        $this->assertEquals(
            [
                ['typeIndependentVariableCode' => 308, 'independentVariableCode' => 8],
                ['typeIndependentVariableCode' => 309, 'independentVariableCode' => 9],
            ],
            $this->areaIndependentVariable2YearTypeValueUniqueIds->getIndependentVariable2Codes()
        );

        $this->assertEquals(
            [
                ['yearId' => 2020],
                ['yearId' => 2019],
            ],
            $this->areaIndependentVariable2YearTypeValueUniqueIds->getYearUniqueIds()
        );
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->typeValueArray = $this->createMock(TypeValueArray::class);
        $this->areaIndependentVariable2YearValue1 = $this->createMock(AreaIndependentVariable2YearValue::class);
        $this->areaIndependentVariable2YearValue2 = $this->createMock(AreaIndependentVariable2YearValue::class);
        $this->areaIndependentVariable2YearValue3 = $this->createMock(AreaIndependentVariable2YearValue::class);
    }

}