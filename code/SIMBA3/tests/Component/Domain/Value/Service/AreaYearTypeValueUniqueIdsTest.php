<?php

namespace Component\Domain\Value\Service;

use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Domain\Value\Entity\AreaYearValue;
use SIMBA3\Component\Domain\Value\Service\AreaYearTypeValueUniqueIds;
use SIMBA3\Component\Domain\Value\Service\TypeValueArray;

class AreaYearTypeValueUniqueIdsTest extends TestCase
{
    private AreaYearTypeValueUniqueIds $areaYearTypeValueUniqueIds;
    private TypeValueArray             $typeValueArray;
    private AreaYearValue              $areaYearValue1;
    private AreaYearValue              $areaYearValue2;
    private AreaYearValue              $areaYearValue3;

    /** @test */
    public function shouldAreaYearTypeValuesUniqueIdsReturnAreasAndYearsArraysWithIds(): void
    {
        $this->givenAnAreaYearTypeValueUniqueIdsWithThreeAreaYearValues();
        $this->thenReturnArraysWithUniqueIds();
    }

    private function givenAnAreaYearTypeValueUniqueIdsWithThreeAreaYearValues(): void
    {
        $this->areaYearTypeValueUniqueIds = new AreaYearTypeValueUniqueIds($this->typeValueArray);
        $this->typeValueArray->method("getValues")->willReturn([
            $this->areaYearValue1,
            $this->areaYearValue2,
            $this->areaYearValue3
        ]);
        $this->areaYearValue1->method("getTypeAreaCode")->willReturn(101);
        $this->areaYearValue1->method("getAreaCode")->willReturn(2);
        $this->areaYearValue1->method("getYear")->willReturn(2020);
        $this->areaYearValue2->method("getTypeAreaCode")->willReturn(101);
        $this->areaYearValue2->method("getAreaCode")->willReturn(2);
        $this->areaYearValue2->method("getYear")->willReturn(2019);
        $this->areaYearValue3->method("getTypeAreaCode")->willReturn(102);
        $this->areaYearValue3->method("getAreaCode")->willReturn(2);
        $this->areaYearValue3->method("getYear")->willReturn(2019);
    }

    private function thenReturnArraysWithUniqueIds(): void
    {
        $this->assertEquals(
            [
                ["typeAreaCode" => 101, "areaCode" => 2],
                ["typeAreaCode" => 102, "areaCode" => 2],
            ],
            $this->areaYearTypeValueUniqueIds->getAreaUniqueIds()
        );
        $this->assertEquals(
            [
                ["yearId" => 2020],
                ["yearId" => 2019],
            ],
            $this->areaYearTypeValueUniqueIds->getYearUniqueIds()
        );
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->typeValueArray = $this->createMock(TypeValueArray::class);
        $this->areaYearValue1 = $this->createMock(AreaYearValue::class);
        $this->areaYearValue2 = $this->createMock(AreaYearValue::class);
        $this->areaYearValue3 = $this->createMock(AreaYearValue::class);
    }

}
