<?php

namespace Component\Application\VariableIndicator\Response;

use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Application\VariableIndicator\Response\ReadAreasIndicatorResponse;
use SIMBA3\Component\Domain\Variable\Entity\Area;
use SIMBA3\Component\Domain\Variable\Entity\TypeArea;

class ReadAreasIndicatorResponseTest extends TestCase
{
    private ReadAreasIndicatorResponse $readAreasIndicatorResponse;
    private Area                       $area1;
    private Area                       $area2;
    private TypeArea                   $typeArea1;
    private TypeArea                   $typeArea2;

    /** @test */
    public function shouldReadAreasIndicatorResponseReturnEmptyArrayWhenNotArea(): void
    {
        $this->givenAReadAreasIndicatorResponseWithoutArea();
        $this->thenReturnAnEmptyArray();
    }

    private function givenAReadAreasIndicatorResponseWithoutArea(): void
    {
        $this->readAreasIndicatorResponse = new ReadAreasIndicatorResponse([]);
    }

    private function thenReturnAnEmptyArray(): void
    {
        $this->assertEquals([], $this->readAreasIndicatorResponse->getAreasIndicatorAsArray());
    }

    /** @test */
    public function shouldReadAreasIndicatorResponseWithOneArea(): void
    {
        $this->givenAReadAreasIndicatorResponseWithArea();
        $this->thenReturnAreaArrayWithOneElement();
    }

    private function givenAReadAreasIndicatorResponseWithArea(): void
    {
        $this->readAreasIndicatorResponse = new ReadAreasIndicatorResponse([$this->area1]);
    }

    private function thenReturnAreaArrayWithOneElement(): void
    {
        $this->assertEquals([
            [
                "TypeAreaId" => 2,
                "TypeAreaName" => "type name 1",
                "AreaId" => 23,
                "AreaName" => "name area 1"
            ]
        ], $this->readAreasIndicatorResponse->getAreasIndicatorAsArray());
    }

    /** @test */
    public function shouldReadAreasIndicatorResponseWithTwoAreas(): void
    {
        $this->givenAReadAreasIndicatorResponseWithTwoAreas();
        $this->thenReturnAreaArrayWithTwoElements();
    }

    private function givenAReadAreasIndicatorResponseWithTwoAreas(): void
    {
        $this->readAreasIndicatorResponse = new ReadAreasIndicatorResponse([$this->area1, $this->area2]);
    }

    private function thenReturnAreaArrayWithTwoElements(): void
    {
        $this->assertEquals([
            [
                "TypeAreaId" => 2,
                "TypeAreaName" => "type name 1",
                "AreaId" => 23,
                "AreaName" => "name area 1"
            ],
            [
                "TypeAreaId" => 3,
                "TypeAreaName" => "type name 2",
                "AreaId" => 45,
                "AreaName" => "name area 2"
            ]
        ], $this->readAreasIndicatorResponse->getAreasIndicatorAsArray());
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->area1 = $this->createMock(Area::class);
        $this->area2 = $this->createMock(Area::class);
        $this->typeArea1 = $this->createMock(TypeArea::class);
        $this->typeArea2 = $this->createMock(TypeArea::class);
        $this->typeArea1->method('getId')->willReturn(2);
        $this->typeArea1->method('getName')->willReturn('type name 1');
        $this->typeArea2->method('getId')->willReturn(3);
        $this->typeArea2->method('getName')->willReturn('type name 2');
        $this->area1->method('getType')->willReturn($this->typeArea1);
        $this->area2->method('getType')->willReturn($this->typeArea2);
        $this->area1->method('getCode')->willReturn(23);
        $this->area1->method('getName')->willReturn('name area 1');
        $this->area2->method('getCode')->willReturn(45);
        $this->area2->method('getName')->willReturn('name area 2');
    }

}
