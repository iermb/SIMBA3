<?php

namespace SIMBA3\Component\Domain\Variable\Service;

use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Domain\Variable\Entity\Area;
use SIMBA3\Component\Domain\Variable\Entity\TypeArea;

class TypeAreaSetTest extends TestCase
{
    private TypeAreaSet $typeAreaSet;
    private Area $area1;
    private Area $area2;
    private Area $area3;
    private TypeArea $typeArea1;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->area1 = $this->createMock(Area::class);
        $this->area2 = $this->createMock(Area::class);
        $this->area3 = $this->createMock(Area::class);
        $this->typeArea1 = $this->createMock(TypeArea::class);
    }

    /** @test */
    public function shouldOneElementTypeAreaCollectionReturnOneElementArray(): void
    {
        $this->givenOneElementTypeAreaSet();
        $this->thenReturnOneElementArray();
    }

    /** @test */
    public function shouldTwoElementTypeAreaSetReturnTwoElementArray(): void
    {
        $this->givenTwoElementTypeAreaSet();
        $this->thenReturnTwoElementArray();
    }

    /** @test */
    public function shouldThreeElementTypeAreaSetReturnThreeElementArray(): void
    {
        $this->givenThreeElementTypeAreaSet();
        $this->thenReturnThreeElementArray();
    }

    private function givenOneElementTypeAreaSet()
    {
        $this->createType1();
        $this->createArea1Type1();
        $this->typeAreaSet = new TypeAreaSet($this->area1);
    }

    private function givenTwoElementTypeAreaSet()
    {
        $this->createType1();
        $this->createArea1Type1();
        $this->createArea2Type1();
        $this->typeAreaSet = new TypeAreaSet($this->area1);
        $this->typeAreaSet->addArea($this->area2);
    }

    private function givenThreeElementTypeAreaSet()
    {
        $this->createType1();
        $this->createArea1Type1();
        $this->createArea2Type1();
        $this->createArea3Type1();
        $this->typeAreaSet = new TypeAreaSet($this->area1);
        $this->typeAreaSet->addArea($this->area2);
        $this->typeAreaSet->addArea($this->area3);
    }

    private function createType1(): void
    {
        $this->typeArea1->method('getId')->willReturn(11);
        $this->typeArea1->method('getCode')->willReturn(111);
        $this->typeArea1->method('getName')->willReturn('Type Area 1');
    }


    private function createArea1Type1(): void
    {
        $this->area1->method('getType')->willReturn($this->typeArea1);
        $this->area1->method('getCode')->willReturn(1);
        $this->area1->method('getName')->willReturn('Area name 1');
    }

    private function createArea2Type1(): void
    {
        $this->area2->method('getType')->willReturn($this->typeArea1);
        $this->area2->method('getCode')->willReturn(2);
        $this->area2->method('getName')->willReturn('Area name 2');
    }

    private function createArea3Type1(): void
    {
        $this->area3->method('getType')->willReturn($this->typeArea1);
        $this->area3->method('getCode')->willReturn(3);
        $this->area3->method('getName')->willReturn('Area name 3');
    }

    private function thenReturnOneElementArray()
    {
        $this->assertEquals(
            [
                'code' => 111,
                'name' => 'Type Area 1',
                "areas" => [
                    [
                        'code' => 1,
                        'name' => 'Area name 1',
                    ]
                ]
            ],
            $this->typeAreaSet->getArray());
    }

    private function thenReturnTwoElementArray()
    {
        $this->assertEquals(
            [
                'code' => 111,
                'name' => 'Type Area 1',
                "areas" => [
                    [
                        'code' => 1,
                        'name' => 'Area name 1',
                    ],
                    [
                        'code' => 2,
                        'name' => 'Area name 2',
                    ],
                ]
            ],
            $this->typeAreaSet->getArray());
    }

    private function thenReturnThreeElementArray()
    {
        $this->assertEquals(
            [
                'code' => 111,
                'name' => 'Type Area 1',
                "areas" => [
                    [
                        'code' => 1,
                        'name' => 'Area name 1',
                    ],
                    [
                        'code' => 2,
                        'name' => 'Area name 2',
                    ],
                    [
                        'code' => 3,
                        'name' => 'Area name 3',
                    ],
                ]
            ],
            $this->typeAreaSet->getArray()
        );
    }
}