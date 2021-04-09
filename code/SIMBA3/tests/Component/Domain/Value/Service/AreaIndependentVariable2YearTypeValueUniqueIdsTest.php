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

        $this->areaIndependentVariable2YearValue1->method("getTypeAreaId")->willReturn(101);
        $this->areaIndependentVariable2YearValue1->method("getAreaId")->willReturn(2);
        $this->areaIndependentVariable2YearValue1->method("getTypeIndependentVariable1Id")->willReturn(205);
        $this->areaIndependentVariable2YearValue1->method("getIndependentVariable1Id")->willReturn(7);
        $this->areaIndependentVariable2YearValue1->method("getTypeIndependentVariable2Id")->willReturn(308);
        $this->areaIndependentVariable2YearValue1->method("getIndependentVariable2Id")->willReturn(8);
        $this->areaIndependentVariable2YearValue1->method("getYear")->willReturn(2020);

        $this->areaIndependentVariable2YearValue2->method("getTypeAreaId")->willReturn(101);
        $this->areaIndependentVariable2YearValue2->method("getAreaId")->willReturn(2);
        $this->areaIndependentVariable2YearValue2->method("getTypeIndependentVariable1Id")->willReturn(206);
        $this->areaIndependentVariable2YearValue2->method("getIndependentVariable1Id")->willReturn(7);
        $this->areaIndependentVariable2YearValue2->method("getTypeIndependentVariable2Id")->willReturn(309);
        $this->areaIndependentVariable2YearValue2->method("getIndependentVariable2Id")->willReturn(9);
        $this->areaIndependentVariable2YearValue2->method("getYear")->willReturn(2019);

        $this->areaIndependentVariable2YearValue3->method("getTypeAreaId")->willReturn(102);
        $this->areaIndependentVariable2YearValue3->method("getAreaId")->willReturn(2);
        $this->areaIndependentVariable2YearValue3->method("getTypeIndependentVariable1Id")->willReturn(206);
        $this->areaIndependentVariable2YearValue3->method("getIndependentVariable1Id")->willReturn(7);
        $this->areaIndependentVariable2YearValue3->method("getTypeIndependentVariable2Id")->willReturn(308);
        $this->areaIndependentVariable2YearValue3->method("getIndependentVariable2Id")->willReturn(8);
        $this->areaIndependentVariable2YearValue3->method("getYear")->willReturn(2019);
    }

    private function thenReturnArraysWithUniqueIds()
    {
        $this->assertEquals(
            [
                ['typeAreaId' => 101, 'areaId' => 2],
                ['typeAreaId' => 102, 'areaId' => 2],
            ],
            $this->areaIndependentVariable2YearTypeValueUniqueIds->getAreaUniqueCodes()
        );

        $this->assertEquals(
            [
                ['typeIndependentVariableId' => 205, 'independentVariableId' => 7],
                ['typeIndependentVariableId' => 206, 'independentVariableId' => 7],
            ],
            $this->areaIndependentVariable2YearTypeValueUniqueIds->getIndependentVariable1Codes()
        );

        $this->assertEquals(
            [
                ['typeIndependentVariableId' => 308, 'independentVariableId' => 8],
                ['typeIndependentVariableId' => 309, 'independentVariableId' => 9],
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