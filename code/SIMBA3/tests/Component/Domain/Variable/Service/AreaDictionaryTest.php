<?php

namespace Component\Domain\Variable\Service;

use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Domain\Variable\Service\AreaDictionary;
use SIMBA3\Component\Domain\Variable\Entity\Area;
use SIMBA3\Component\Domain\Variable\Entity\TypeArea;

class AreaDictionaryTest extends TestCase
{
    private AreaDictionary $areaDictionary;
    private Area           $area1;
    private Area           $area2;
    private TypeArea       $typeArea1;
    private TypeArea       $typeArea2;

    /** @test */
    public function shouldAreaDictionaryWithoutAreaReturnAreaAsArray(): void
    {
        $this->givenAnAreaDictionaryWithoutAreas();
        $this->thenReturnEmptyArray();
    }

    private function givenAnAreaDictionaryWithoutAreas(): void
    {
        $this->areaDictionary = new AreaDictionary([]);
    }

    private function thenReturnEmptyArray(): void
    {
        $this->assertEquals([], $this->areaDictionary->getDictionaryValuesAsArray());
    }

    /** @test */
    public function shouldAreaDictionaryWithOneAreaAreaReturnAreaAsArray(): void
    {
        $this->givenAnAreaDictionaryWithOneArea();
        $this->thenReturnArrayWithOneArea();
    }

    /** @test */
    public function shouldAreaDictionaryWithTwoAreasReturnAreaAsArray(): void
    {
        $this->givenAnAreaDictionaryWithTwoAreas();
        $this->thenReturnArrayWithTwoAreas();
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->area1 = $this->createMock(Area::class);
        $this->area2 = $this->createMock(Area::class);
        $this->typeArea1 = $this->createMock(TypeArea::class);
        $this->typeArea2 = $this->createMock(Typearea::class);
    }

    private function givenAnAreaDictionaryWithOneArea(): void
    {
        $this->areaDictionary = new AreaDictionary([$this->area1]);
        $this->area1->method("getCode")->willReturn(2);
        $this->area1->method("getName")->willReturn("Area Name");
        $this->area1->method("getType")->willReturn($this->typeArea1);
        $this->typeArea1->method("getCode")->willReturn(101);
        $this->typeArea1->method("getId")->willReturn(11);
        $this->typeArea1->method("getName")->willReturn("Type Area Name");
    }

    private function givenAnAreaDictionaryWithTwoAreas(): void
    {
        $this->areaDictionary = new AreaDictionary([$this->area1, $this->area2]);
        $this->area1->method("getCode")->willReturn(2);
        $this->area1->method("getName")->willReturn("Area Name");
        $this->area1->method("getType")->willReturn($this->typeArea1);
        $this->typeArea1->method("getCode")->willReturn(101);
        $this->typeArea1->method("getId")->willReturn(11);
        $this->typeArea1->method("getName")->willReturn("Type Area Name");
        $this->area2->method("getCode")->willReturn(5);
        $this->area2->method("getName")->willReturn("Area Name 2");
        $this->area2->method("getType")->willReturn($this->typeArea2);
        $this->typeArea2->method("getCode")->willReturn(102);
        $this->typeArea2->method("getId")->willReturn(12);
        $this->typeArea2->method("getName")->willReturn("Type Area Name 2");
    }

    private function thenReturnArrayWithOneArea(): void
    {
        $this->assertEquals([
            [
                "code" => 101,
                "name" => "Type Area Name",
                "areas" => [
                    [
                        "code" => 2,
                        "name" => "Area Name"
                    ]
                ]
            ]
        ], $this->areaDictionary->getDictionaryValuesAsArray());
    }

    private function thenReturnArrayWithTwoAreas(): void
    {
        $this->assertEquals([
            [
                "code" => 101,
                "name" => "Type Area Name",
                "areas" => [
                    [
                        "code" => 2,
                        "name" => "Area Name"
                    ]
                ]
            ],
            [
                "code" => 102,
                "name" => "Type Area Name 2",
                "areas" => [
                    [
                        "code" => 5,
                        "name" => "Area Name 2"
                    ]
                ]
            ]
        ], $this->areaDictionary->getDictionaryValuesAsArray());
    }

}