<?php

namespace SIMBA3\Component\Application\Variable\Response;

use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Application\Variable\Response\ReadAllAreaTypeAreaResponse;
use SIMBA3\Component\Domain\Variable\Entity\Area;
use SIMBA3\Component\Domain\Variable\Entity\TypeArea;

class ReadAllAreaTypeAreaResponseTest extends TestCase
{
    private ReadAllAreaTypeAreaResponse $readAllAreaTypeAreaResponse;

    private array $areaArray;

    private Area $area1;
    private Area $area2;
    private TypeArea $typeArea1;
    private TypeArea $typeArea2;

    public function setUp(): void
    {
        parent::setUp();
        
        $this->typeArea1 = $this->createMock(TypeArea::class);
        $this->typeArea1->method('getName')->willReturn('nom tipus');
                
        $this->area1 = $this->createMock(Area::class);
        $this->area1->method('getId')->willReturn(1);
        $this->area1->method('getName')->willReturn('nom');
        $this->area1->method('getType')->willReturn($this->typeArea1);

        $this->typeArea2 = $this->createMock(TypeArea::class);
        $this->typeArea2->method('getName')->willReturn('nom tipus 2');
                
        $this->area2 = $this->createMock(Area::class);
        $this->area2->method('getId')->willReturn(2);
        $this->area2->method('getName')->willReturn('nom 2');
        $this->area2->method('getType')->willReturn($this->typeArea2);
    }

    /** @test */
    public function shouldReadAllAreaTypeAreaResponseReturnEmptyArray(): void
    {
        $this->givenEmptyAreaArray();
        $this->givenAreaArrayResponse();        
        $this->thenReturnEmptyArray();
    }

    /** @test */
    public function shouldReadAllAreaTypeAreaResponseReturnOneElementArray(): void
    {
        $this->givenOneElementAreaArray();
        $this->givenAreaArrayResponse();
        $this->thenReturnOneElementAreaArray();
    }

    /** @test */
    public function shouldReadAllAreaTypeAreaResponseReturnSeveralElementArray(): void
    {
        $this->givenSeveralElementAreaArray();
        $this->givenAreaArrayResponse();
        $this->thenReturnSeveralElementAreaArray();
    }

    private function givenAreaArrayResponse()
    {
        $this->readAllAreaTypeAreaResponse = new ReadAllAreaTypeAreaResponse($this->areaArray);
    }

    private function givenEmptyAreaArray()
    {
        $this->areaArray = [];
    }

    private function thenReturnEmptyArray()
    {
        $this->assertEquals(0, count($this->readAllAreaTypeAreaResponse->getAllArea()));
    }

    private function givenOneElementAreaArray()
    {
        $this->areaArray = [$this->area1];
    }

    private function thenReturnOneElementAreaArray()
    {

        $allAreaArray = $this->readAllAreaTypeAreaResponse->getAllArea();

        $this->assertIsArray($allAreaArray);
        $this->assertEquals(1, count($allAreaArray));
        $this->assertEquals(
            [
                [
                    "id" => 1,
                    "name" => 'nom',
                    "type_name" => 'nom tipus'
                ]
            ],
            $allAreaArray
        );
    }

    private function givenSeveralElementAreaArray()
    {
        $this->areaArray = [$this->area1, $this->area2];
    }

    private function thenReturnSeveralElementAreaArray()
    {
        $allAreaArray = $this->readAllAreaTypeAreaResponse->getAllArea();

        $this->assertIsArray($allAreaArray);
        $this->assertEquals(2, count($allAreaArray));
        $this->assertEquals(
            [
                [
                    "id" => 1,
                    "name" => 'nom',
                    "type_name" => 'nom tipus'
                ],
                [
                    "id" => 2,
                    "name" => 'nom 2',
                    "type_name" => 'nom tipus 2'
                ],
            ],
            $allAreaArray
        );
    }
}
