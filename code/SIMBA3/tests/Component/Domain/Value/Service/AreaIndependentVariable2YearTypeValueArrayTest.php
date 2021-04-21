<?php


namespace SIMBA3\Component\Domain\Value\Service;


use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Domain\Value\Entity\AreaIndependentVariable2YearValue;

class AreaIndependentVariable2YearTypeValueArrayTest extends TestCase
{
    private AreaIndependentVariable2YearTypeValueArray $areaIndependentVariable2YearTypeValueArray;
    private AreaIndependentVariable2YearValue $areaIndependentVariable2YearValue1;
    private AreaIndependentVariable2YearValue $areaIndependentVariable2YearValue2;
    private AreaIndependentVariable2YearValue $areaIndependentVariable2YearValue3;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->areaIndependentVariable2YearValue1 = $this->createMock(AreaIndependentVariable2YearValue::class);
        $this->areaIndependentVariable2YearValue1->method('getIndicatorId')->willReturn(1);
        $this->areaIndependentVariable2YearValue1->method('getTypeAreaCode')->willReturn(10);
        $this->areaIndependentVariable2YearValue1->method('getAreaCode')->willReturn(100);
        $this->areaIndependentVariable2YearValue1->method('getTypeIndependentVariable1Code')->willReturn(5);
        $this->areaIndependentVariable2YearValue1->method('getIndependentVariable1Code')->willReturn(50);
        $this->areaIndependentVariable2YearValue1->method('getTypeIndependentVariable2Code')->willReturn(1000);
        $this->areaIndependentVariable2YearValue1->method('getIndependentVariable2Code')->willReturn(10000);
        $this->areaIndependentVariable2YearValue1->method('getYear')->willReturn(2019);
        $this->areaIndependentVariable2YearValue1->method('getValue')->willReturn(3.14);

        $this->areaIndependentVariable2YearValue2 = $this->createMock(AreaIndependentVariable2YearValue::class);
        $this->areaIndependentVariable2YearValue2->method('getIndicatorId')->willReturn(2);
        $this->areaIndependentVariable2YearValue2->method('getTypeAreaCode')->willReturn(20);
        $this->areaIndependentVariable2YearValue2->method('getAreaCode')->willReturn(200);
        $this->areaIndependentVariable2YearValue2->method('getTypeIndependentVariable1Code')->willReturn(6);
        $this->areaIndependentVariable2YearValue2->method('getIndependentVariable1Code')->willReturn(60);
        $this->areaIndependentVariable2YearValue2->method('getTypeIndependentVariable2Code')->willReturn(1000);
        $this->areaIndependentVariable2YearValue2->method('getIndependentVariable2Code')->willReturn(10000);
        $this->areaIndependentVariable2YearValue2->method('getYear')->willReturn(2020);
        $this->areaIndependentVariable2YearValue2->method('getValue')->willReturn(4.14);

        $this->areaIndependentVariable2YearValue3 = $this->createMock(AreaIndependentVariable2YearValue::class);
        $this->areaIndependentVariable2YearValue3->method('getIndicatorId')->willReturn(3);
        $this->areaIndependentVariable2YearValue3->method('getTypeAreaCode')->willReturn(20);
        $this->areaIndependentVariable2YearValue3->method('getAreaCode')->willReturn(200);
        $this->areaIndependentVariable2YearValue3->method('getTypeIndependentVariable1Code')->willReturn(6);
        $this->areaIndependentVariable2YearValue3->method('getIndependentVariable1Code')->willReturn(60);
        $this->areaIndependentVariable2YearValue3->method('getTypeIndependentVariable2Code')->willReturn(2000);
        $this->areaIndependentVariable2YearValue3->method('getIndependentVariable2Code')->willReturn(20000);
        $this->areaIndependentVariable2YearValue3->method('getYear')->willReturn(2019);
        $this->areaIndependentVariable2YearValue3->method('getValue')->willReturn(5.14);
    }

    /** @test */
    public function shouldEmptyAreaIndependentVariable2YearTypeValueArrayReturnEmptyArray(): void
    {
        $this->givenEmptyAreaIndependentVariable2YearTypeValueArray();
        $this->thenReturnsEmptyArray();
    }

    private function givenEmptyAreaIndependentVariable2YearTypeValueArray(): void
    {
        $this->areaIndependentVariable2YearTypeValueArray =  new AreaIndependentVariable2YearTypeValueArray([]);
    }

    private function thenReturnsEmptyArray(): void
    {
        $this->assertEquals([],$this->areaIndependentVariable2YearTypeValueArray->getValues());
        $this->assertEquals([],$this->areaIndependentVariable2YearTypeValueArray->getValuesAsArray());
        $this->assertEquals([],$this->areaIndependentVariable2YearTypeValueArray->getAreas());
        $this->assertEquals([],$this->areaIndependentVariable2YearTypeValueArray->getIndependentVariable(1));
        $this->assertEquals([],$this->areaIndependentVariable2YearTypeValueArray->getIndependentVariable(2));
        $this->assertEquals([],$this->areaIndependentVariable2YearTypeValueArray->getYears());
    }

    /** @test */
    public function shouldOneElementAreaIndependentVariable2YearTypeValueArrayReturnOneElementArray(): void
    {
        $this->givenOneElementAreaIndependentVariable2YearTypeValueArray();
        $this->thenReturnsOneElementArray();
    }

    private function givenOneElementAreaIndependentVariable2YearTypeValueArray(): void
    {
        $this->areaIndependentVariable2YearTypeValueArray =  new AreaIndependentVariable2YearTypeValueArray([
            $this->areaIndependentVariable2YearValue1
        ]);
    }

    private function thenReturnsOneElementArray(): void
    {
        $this->assertEquals([
            $this->areaIndependentVariable2YearValue1
        ],$this->areaIndependentVariable2YearTypeValueArray->getValues());

        $this->assertEquals([
            [
                1,
                10,
                100,
                5,
                50,
                1000,
                10000,
                2019,
                3.14,
            ]
        ],$this->areaIndependentVariable2YearTypeValueArray->getValuesAsArray());

        $this->assertEquals([
            [
                'typeAreaCode' => 10,
                'areaCode' => 100,
            ]
        ],$this->areaIndependentVariable2YearTypeValueArray->getAreas());

        $this->assertEquals([
            [
                'typeIndependentVariableCode' => 5,
                'independentVariableCode' => 50,
            ]
        ],$this->areaIndependentVariable2YearTypeValueArray->getIndependentVariable(1));


        $this->assertEquals([
            [
                'typeIndependentVariableCode' => 1000,
                'independentVariableCode' => 10000,
            ]
        ],$this->areaIndependentVariable2YearTypeValueArray->getIndependentVariable(2));

        $this->assertEquals([
            [
                'yearId' => 2019
            ]
        ],$this->areaIndependentVariable2YearTypeValueArray->getYears());
    }

    /** @test */
    public function shouldTwoElementAreaIndependentVariable2YearTypeValueArrayReturnTwoElementsArray(): void
    {
        $this->givenTwoElementAreaIndependentVariable2YearTypeValuesArray();
        $this->thenReturnsTwoElementsArray();
    }

    private function givenTwoElementAreaIndependentVariable2YearTypeValuesArray(): void
    {
        $this->areaIndependentVariable2YearTypeValueArray =  new AreaIndependentVariable2YearTypeValueArray([
            $this->areaIndependentVariable2YearValue1,
            $this->areaIndependentVariable2YearValue2,
        ]);
    }

    private function thenReturnsTwoElementsArray(): void
    {
        $this->assertEquals([
            $this->areaIndependentVariable2YearValue1,
            $this->areaIndependentVariable2YearValue2,
        ],$this->areaIndependentVariable2YearTypeValueArray->getValues());

        $this->assertEquals([
            [
                1,
                10,
                100,
                5,
                50,
                1000,
                10000,
                2019,
                3.14,
            ],
            [
                2,
                20,
                200,
                6,
                60,
                1000,
                10000,
                2020,
                4.14,
            ],
        ],$this->areaIndependentVariable2YearTypeValueArray->getValuesAsArray());

        $this->assertEquals([
            [
                'typeAreaCode' => 10,
                'areaCode' => 100,
            ],[
                'typeAreaCode' => 20,
                'areaCode' => 200,
            ],
        ],$this->areaIndependentVariable2YearTypeValueArray->getAreas());

        $this->assertEquals([
            [
                'typeIndependentVariableCode' => 5,
                'independentVariableCode' => 50,
            ],
            [
                'typeIndependentVariableCode' => 6,
                'independentVariableCode' => 60,
            ]
        ],$this->areaIndependentVariable2YearTypeValueArray->getIndependentVariable(1));

        $this->assertEquals([
            [
                'typeIndependentVariableCode' => 1000,
                'independentVariableCode' => 10000,
            ]
        ],$this->areaIndependentVariable2YearTypeValueArray->getIndependentVariable(2));

        $this->assertEquals([
            [
                'yearId' => 2019
            ],[
                'yearId' => 2020
            ],
        ],$this->areaIndependentVariable2YearTypeValueArray->getYears());
    }

    /** @test */
    public function shouldThreeElementAreaIndependentVariable2YearTypeValueArrayReturnThreeElementsArray(): void
    {
        $this->givenThreeElementAreaIndependentVariable2YearTypeValuesArray();
        $this->thenReturnsThreeElementsArray();
    }

    private function givenThreeElementAreaIndependentVariable2YearTypeValuesArray(): void
    {
        $this->areaIndependentVariable2YearTypeValueArray =  new AreaIndependentVariable2YearTypeValueArray([
            $this->areaIndependentVariable2YearValue1,
            $this->areaIndependentVariable2YearValue2,
            $this->areaIndependentVariable2YearValue3,
        ]);
    }

    private function thenReturnsThreeElementsArray(): void
    {
        $this->assertEquals([
            $this->areaIndependentVariable2YearValue1,
            $this->areaIndependentVariable2YearValue2,
            $this->areaIndependentVariable2YearValue3,
        ],$this->areaIndependentVariable2YearTypeValueArray->getValues());

        $this->assertEquals([
            [
                1,
                10,
                100,
                5,
                50,
                1000,
                10000,
                2019,
                3.14,
            ],
            [
                2,
                20,
                200,
                6,
                60,
                1000,
                10000,
                2020,
                4.14,
            ],
            [
                3,
                20,
                200,
                6,
                60,
                2000,
                20000,
                2019,
                5.14,
            ],
        ],$this->areaIndependentVariable2YearTypeValueArray->getValuesAsArray());

        $this->assertEquals([
            [
                'typeAreaCode' => 10,
                'areaCode' => 100,
            ],[
                'typeAreaCode' => 20,
                'areaCode' => 200,
            ],
        ],$this->areaIndependentVariable2YearTypeValueArray->getAreas());

        $this->assertEquals([
            [
                'typeIndependentVariableCode' => 5,
                'independentVariableCode' => 50,
            ],
            [
                'typeIndependentVariableCode' => 6,
                'independentVariableCode' => 60,
            ]
        ],$this->areaIndependentVariable2YearTypeValueArray->getIndependentVariable(1));

        $this->assertEquals([
            [
                'typeIndependentVariableCode' => 1000,
                'independentVariableCode' => 10000,
            ],
            [
                'typeIndependentVariableCode' => 2000,
                'independentVariableCode' => 20000,
            ]
        ],$this->areaIndependentVariable2YearTypeValueArray->getIndependentVariable(2));

        $this->assertEquals([
            [
                'yearId' => 2019
            ],[
                'yearId' => 2020
            ],
        ],$this->areaIndependentVariable2YearTypeValueArray->getYears());
    }
}