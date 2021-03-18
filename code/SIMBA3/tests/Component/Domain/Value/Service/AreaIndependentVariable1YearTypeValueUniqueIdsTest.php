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

        $this->areaIndependentVariable1YearValue1->method("getTypeAreaId")->willReturn(101);
        $this->areaIndependentVariable1YearValue1->method("getAreaId")->willReturn(2);
        $this->areaIndependentVariable1YearValue1->method("getTypeIndependentVariableId")->willReturn(205);
        $this->areaIndependentVariable1YearValue1->method("getIndependentVariableId")->willReturn(7);
        $this->areaIndependentVariable1YearValue1->method("getYear")->willReturn(2020);

        $this->areaIndependentVariable1YearValue2->method("getTypeAreaId")->willReturn(101);
        $this->areaIndependentVariable1YearValue2->method("getAreaId")->willReturn(2);
        $this->areaIndependentVariable1YearValue2->method("getTypeIndependentVariableId")->willReturn(206);
        $this->areaIndependentVariable1YearValue2->method("getIndependentVariableId")->willReturn(7);
        $this->areaIndependentVariable1YearValue2->method("getYear")->willReturn(2019);

        $this->areaIndependentVariable1YearValue3->method("getTypeAreaId")->willReturn(102);
        $this->areaIndependentVariable1YearValue3->method("getAreaId")->willReturn(2);
        $this->areaIndependentVariable1YearValue3->method("getTypeIndependentVariableId")->willReturn(206);
        $this->areaIndependentVariable1YearValue3->method("getIndependentVariableId")->willReturn(7);
        $this->areaIndependentVariable1YearValue3->method("getYear")->willReturn(2019);
    }

    private function thenReturnArraysWithUniqueIds()
    {
        $this->assertEquals(
            [
                ['typeAreaId' => 101, 'areaId' => 2],
                ['typeAreaId' => 102, 'areaId' => 2],
            ],
            $this->areaIndependentVariable1YearTypeValueUniqueIds->getAreaUniqueIds()
        );

        $this->assertEquals(
            [
                ['typeIndependentVariableId' => 205, 'independentVariableId' => 7],
                ['typeIndependentVariableId' => 206, 'independentVariableId' => 7],
            ],
            $this->areaIndependentVariable1YearTypeValueUniqueIds->getIndependentVariable1Ids()
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