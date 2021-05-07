<?php

namespace Component\Application\VariableIndicator\Response;

use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Application\VariableIndicator\Response\ReadYearsIndicatorResponse;
use SIMBA3\Component\Domain\Variable\Entity\Year;

class ReadYearsIndicatorResponseTest extends TestCase
{
    private ReadYearsIndicatorResponse $readYearsIndicatorResponse;
    private Year                       $year1;
    private Year                       $year2;

    /** @test */
    public function shouldReadYearsIndicatorResponseWithoutYearsReturnEmptyArray(): void
    {
        $this->givenAReadYearsIndicatorResponseWithoutYears();
        $this->thenReturnEmptyArray();
    }

    private function givenAReadYearsIndicatorResponseWithoutYears(): void
    {
        $this->readYearsIndicatorResponse = new ReadYearsIndicatorResponse([]);
    }

    private function thenReturnEmptyArray(): void
    {
        $this->assertEquals([], $this->readYearsIndicatorResponse->getYearsIndicatorAsArray());
    }

    /** @test */
    public function shouldReadYearsIndicatorResponseWithOneYearReturnArrayWithOneElement(): void
    {
        $this->givenAReadYearsIndicatorResponseWithOneYear();
        $this->thenReturnArrayWithOneElement();
    }

    private function givenAReadYearsIndicatorResponseWithOneYear(): void
    {
        $this->readYearsIndicatorResponse = new ReadYearsIndicatorResponse([$this->year1]);
    }

    private function thenReturnArrayWithOneElement(): void
    {
        $this->assertEquals([["yearId" => 2020, "yearName" => 2020]],
            $this->readYearsIndicatorResponse->getYearsIndicatorAsArray());
    }

    /** @test */
    public function shouldReadYearsIndicatorResponseWithTwoYearsReturnArrayWithTwoElements(): void
    {
        $this->givenAReadYearsIndicatorResponseWithTwoYears();
        $this->thenReturnArrayWithTwoElements();
    }

    private function givenAReadYearsIndicatorResponseWithTwoYears(): void
    {
        $this->readYearsIndicatorResponse = new ReadYearsIndicatorResponse([$this->year1, $this->year2]);
    }

    private function thenReturnArrayWithTwoElements(): void
    {
        $this->assertEquals([
            ["yearId" => 2020, "yearName" => 2020],
            ["yearId" => 2021, "yearName" => 2021]
        ], $this->readYearsIndicatorResponse->getYearsIndicatorAsArray());
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->year1 = $this->createMock(Year::class);
        $this->year1->method('getId')->willReturn(2020);
        $this->year1->method('getYear')->willReturn(2020);
        $this->year2 = $this->createMock(Year::class);
        $this->year2->method('getId')->willReturn(2021);
        $this->year2->method('getYear')->willReturn(2021);
    }


}
