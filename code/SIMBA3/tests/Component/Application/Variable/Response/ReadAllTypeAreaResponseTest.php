<?php

namespace SIMBA3\Component\Application\Variable\Response;

use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Domain\Variable\Entity\TypeArea;

class ReadAllTypeAreaResponseTest extends TestCase
{
    private ReadAllTypeAreaResponse $readAllTypeAreaResponse;

    private array $typeAreaArray;

    private TypeArea $typeArea1;
    private TypeArea $typeArea2;

    public function setUp(): void
    {
        parent::setUp();

        $this->typeArea1 = $this->createMock(TypeArea::class);
        $this->typeArea1->method('getCode')->willReturn(1);
        $this->typeArea1->method('getName')->willReturn('nom');

        $this->typeArea2 = $this->createMock(TypeArea::class);
        $this->typeArea2->method('getCode')->willReturn(2);
        $this->typeArea2->method('getName')->willReturn('nom 2');
    }

    /** @test */
    public function shouldReadAllTypeAreaResponseReturnEmptyArray(): void
    {
        $this->givenEmptyTypeAreaArray();
        $this->givenTypeAreaArrayResponse();        
        $this->thenReturnEmptyArray();
    }

    /** @test */
    public function shouldReadAllAreaTypeAreaResponseReturnOneElementArray(): void
    {
        $this->givenOneElementTypeAreaArray();
        $this->givenTypeAreaArrayResponse();
        $this->thenReturnOneElementTypeAreaArray();
    }

    /** @test */
    public function shouldReadAllAreaTypeAreaResponseReturnSeveralElementArray(): void
    {
        $this->givenSeveralElementAreaArray();
        $this->givenTypeAreaArrayResponse();
        $this->thenReturnSeveralElementTypeAreaArray();
    }

    private function givenTypeAreaArrayResponse()
    {
        $this->readAllTypeAreaResponse = new ReadAllTypeAreaResponse($this->typeAreaArray);
    }

    private function givenEmptyTypeAreaArray()
    {
        $this->typeAreaArray = [];
    }

    private function thenReturnEmptyArray()
    {
        $this->assertEquals(0, count($this->readAllTypeAreaResponse->getAllTypeArea()));
    }

    private function givenOneElementTypeAreaArray()
    {
        $this->typeAreaArray = [$this->typeArea1];
    }

    private function thenReturnOneElementTypeAreaArray()
    {

        $allTypeAreaArray = $this->readAllTypeAreaResponse->getAllTypeArea();

        $this->assertIsArray($allTypeAreaArray);
        $this->assertEquals(1, count($allTypeAreaArray));
        $this->assertEquals(
            [
                [
                    "code" => 1,
                    "name" => 'nom',
                ]
            ],
            $allTypeAreaArray
        );
    }

    private function givenSeveralElementAreaArray()
    {
        $this->typeAreaArray = [$this->typeArea1, $this->typeArea2];
    }

    private function thenReturnSeveralElementTypeAreaArray()
    {
        $allTypeAreaArray = $this->readAllTypeAreaResponse->getAllTypeArea();

        $this->assertIsArray($allTypeAreaArray);
        $this->assertEquals(2, count($allTypeAreaArray));
        $this->assertEquals(
            [
                [
                    "code" => 1,
                    "name" => 'nom',
                ],
                [
                    "code" => 2,
                    "name" => 'nom 2',
                ],
            ],
            $allTypeAreaArray
        );
    }
}
