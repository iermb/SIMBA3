<?php


namespace SIMBA3\Component\Domain\Variable\Service;


use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Domain\Value\Entity\AreaIndependentVariable1YearValue;

class AreaIndependentVariable1YearTypeValueArrayTest extends TestCase
{
    private AreaIndependentVariable1YearTypeValueArray $areaIndependentVariable1YearTypeValueArray;
    private AreaIndependentVariable1YearValue $areaIndependentVariable1YearValue1;
    private AreaIndependentVariable1YearValue $areaIndependentVariable1YearValue2;
    private AreaIndependentVariable1YearValue $areaIndependentVariable1YearValue3;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->areaIndependentVariable1YearValue1 = $this->createMock(AreaIndependentVariable1YearValue::class);
        $this->areaIndependentVariable1YearValue1->method('getIndicatorId')->willReturn(1);
        $this->areaIndependentVariable1YearValue1->method('getTypeAreaCode')->willReturn(10);
        $this->areaIndependentVariable1YearValue1->method('getAreaCode')->willReturn(100);
        $this->areaIndependentVariable1YearValue1->method('getTypeIndependentVariable1Code')->willReturn(1000);
        $this->areaIndependentVariable1YearValue1->method('getIndependentVariable1Code')->willReturn(10000);
        $this->areaIndependentVariable1YearValue1->method('getYear')->willReturn(2019);
        $this->areaIndependentVariable1YearValue1->method('getValue')->willReturn(3.14);

        $this->areaIndependentVariable1YearValue2 = $this->createMock(AreaIndependentVariable1YearValue::class);
        $this->areaIndependentVariable1YearValue2->method('getIndicatorId')->willReturn(2);
        $this->areaIndependentVariable1YearValue2->method('getTypeAreaCode')->willReturn(20);
        $this->areaIndependentVariable1YearValue2->method('getAreaCode')->willReturn(200);
        $this->areaIndependentVariable1YearValue2->method('getTypeIndependentVariable1Code')->willReturn(1000);
        $this->areaIndependentVariable1YearValue2->method('getIndependentVariable1Code')->willReturn(10000);
        $this->areaIndependentVariable1YearValue2->method('getYear')->willReturn(2020);
        $this->areaIndependentVariable1YearValue2->method('getValue')->willReturn(4.14);

        $this->areaIndependentVariable1YearValue3 = $this->createMock(AreaIndependentVariable1YearValue::class);
        $this->areaIndependentVariable1YearValue3->method('getIndicatorId')->willReturn(3);
        $this->areaIndependentVariable1YearValue3->method('getTypeAreaCode')->willReturn(20);
        $this->areaIndependentVariable1YearValue3->method('getAreaCode')->willReturn(200);
        $this->areaIndependentVariable1YearValue3->method('getTypeIndependentVariable1Code')->willReturn(2000);
        $this->areaIndependentVariable1YearValue3->method('getIndependentVariable1Code')->willReturn(20000);
        $this->areaIndependentVariable1YearValue3->method('getYear')->willReturn(2019);
        $this->areaIndependentVariable1YearValue3->method('getValue')->willReturn(5.14);
    }

    /** @test */
    public function shouldEmptyAreaIndependentVariable1YearTypeValueArrayReturnEmptyArray(): void
    {
        $this->givenEmptyAreaIndependentVariable1YearTypeValueArray();
        $this->thenReturnsEmptyArray();
    }

    private function givenEmptyAreaIndependentVariable1YearTypeValueArray(): void
    {
        $this->areaIndependentVariable1YearTypeValueArray =  new AreaIndependentVariable1YearTypeValueArray([]);
    }

    private function thenReturnsEmptyArray(): void
    {
        $this->assertEquals([],$this->areaIndependentVariable1YearTypeValueArray->getValues());
        $this->assertEquals([],$this->areaIndependentVariable1YearTypeValueArray->getValuesAsArray());
        $this->assertEquals([],$this->areaIndependentVariable1YearTypeValueArray->getAreas());
        $this->assertEquals([],$this->areaIndependentVariable1YearTypeValueArray->getIndependentVariable(1));
        $this->assertEquals([],$this->areaIndependentVariable1YearTypeValueArray->getYears());
    }

    /** @test */
    public function shouldOneElementAreaIndependentVariable1YearTypeValueArrayReturnOneElementArray(): void
    {
        $this->givenOneElementAreaIndependentVariable1YearTypeValueArray();
        $this->thenReturnsOneElementArray();
    }

    private function givenOneElementAreaIndependentVariable1YearTypeValueArray(): void
    {
        $this->areaIndependentVariable1YearTypeValueArray =  new AreaIndependentVariable1YearTypeValueArray([
            $this->areaIndependentVariable1YearValue1
        ]);
    }

    private function thenReturnsOneElementArray(): void
    {
        $this->assertEquals([
            $this->areaIndependentVariable1YearValue1
        ],$this->areaIndependentVariable1YearTypeValueArray->getValues());

        $this->assertEquals([
            [
                1,
                10,
                100,
                1000,
                10000,
                2019,
                3.14,
            ]
        ],$this->areaIndependentVariable1YearTypeValueArray->getValuesAsArray());

        $this->assertEquals([
            [
                'typeAreaCode' => 10,
                'areaCode' => 100,
            ]
        ],$this->areaIndependentVariable1YearTypeValueArray->getAreas());

        $this->assertEquals([
            [
                'typeIndependentVariableCode' => 1000,
                'independentVariableCode' => 10000,
            ]
        ],$this->areaIndependentVariable1YearTypeValueArray->getIndependentVariable(1));

        $this->assertEquals([
            [
                'yearId' => 2019
            ]
        ],$this->areaIndependentVariable1YearTypeValueArray->getYears());
    }

    /** @test */
    public function shouldTwoElementAreaIndependentVariable1YearTypeValueArrayReturnTwoElementsArray(): void
    {
        $this->givenTwoElementAreaIndependentVariable1YearTypeValuesArray();
        $this->thenReturnsTwoElementsArray();
    }

    private function givenTwoElementAreaIndependentVariable1YearTypeValuesArray(): void
    {
        $this->areaIndependentVariable1YearTypeValueArray =  new AreaIndependentVariable1YearTypeValueArray([
            $this->areaIndependentVariable1YearValue1,
            $this->areaIndependentVariable1YearValue2,
        ]);
    }

    private function thenReturnsTwoElementsArray(): void
    {
        $this->assertEquals([
            $this->areaIndependentVariable1YearValue1,
            $this->areaIndependentVariable1YearValue2,
        ],$this->areaIndependentVariable1YearTypeValueArray->getValues());

        $this->assertEquals([
            [
                1,
                10,
                100,
                1000,
                10000,
                2019,
                3.14,
            ],
            [
                2,
                20,
                200,
                1000,
                10000,
                2020,
                4.14,
            ],
        ],$this->areaIndependentVariable1YearTypeValueArray->getValuesAsArray());

        $this->assertEquals([
            [
                'typeAreaCode' => 10,
                'areaCode' => 100,
            ],[
                'typeAreaCode' => 20,
                'areaCode' => 200,
            ],
        ],$this->areaIndependentVariable1YearTypeValueArray->getAreas());

        $this->assertEquals([
            [
                'typeIndependentVariableCode' => 1000,
                'independentVariableCode' => 10000,
            ]
        ],$this->areaIndependentVariable1YearTypeValueArray->getIndependentVariable(1));

        $this->assertEquals([
            [
                'yearId' => 2019
            ],[
                'yearId' => 2020
            ],
        ],$this->areaIndependentVariable1YearTypeValueArray->getYears());
    }

    /** @test */
    public function shouldThreeElementAreaIndependentVariable1YearTypeValueArrayReturnThreeElementsArray(): void
    {
        $this->givenThreeElementAreaIndependentVariable1YearTypeValuesArray();
        $this->thenReturnsThreeElementsArray();
    }

    private function givenThreeElementAreaIndependentVariable1YearTypeValuesArray(): void
    {
        $this->areaIndependentVariable1YearTypeValueArray =  new AreaIndependentVariable1YearTypeValueArray([
            $this->areaIndependentVariable1YearValue1,
            $this->areaIndependentVariable1YearValue2,
            $this->areaIndependentVariable1YearValue3,
        ]);
    }

    private function thenReturnsThreeElementsArray(): void
    {
        $this->assertEquals([
            $this->areaIndependentVariable1YearValue1,
            $this->areaIndependentVariable1YearValue2,
            $this->areaIndependentVariable1YearValue3,
        ],$this->areaIndependentVariable1YearTypeValueArray->getValues());

        $this->assertEquals([
            [
                1,
                10,
                100,
                1000,
                10000,
                2019,
                3.14,
            ],
            [
                2,
                20,
                200,
                1000,
                10000,
                2020,
                4.14,
            ],
            [
                3,
                20,
                200,
                2000,
                20000,
                2019,
                5.14,
            ],
        ],$this->areaIndependentVariable1YearTypeValueArray->getValuesAsArray());

        $this->assertEquals([
            [
                'typeAreaCode' => 10,
                'areaCode' => 100,
            ],[
                'typeAreaCode' => 20,
                'areaCode' => 200,
            ],
        ],$this->areaIndependentVariable1YearTypeValueArray->getAreas());

        $this->assertEquals([
            [
                'typeIndependentVariableCode' => 1000,
                'independentVariableCode' => 10000,
            ],
            [
                'typeIndependentVariableCode' => 2000,
                'independentVariableCode' => 20000,
            ]
        ],$this->areaIndependentVariable1YearTypeValueArray->getIndependentVariable(1));

        $this->assertEquals([
            [
                'yearId' => 2019
            ],[
                'yearId' => 2020
            ],
        ],$this->areaIndependentVariable1YearTypeValueArray->getYears());
    }
}