<?php

namespace Component\Domain\Filter\Service;

use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Domain\Filter\Service\AreaFilter;
use SIMBA3\Component\Domain\Filter\Service\AreasFilter;

class AreasFilterTest extends TestCase
{
    private AreasFilter $areasFilter;
    private AreaFilter  $areaFilter1;
    private AreaFilter  $areaFilter2;

    /** @test */
    public function shouldAreasFilterWhenDontHaveAreaFilterReturnEmptyArray(): void
    {
        $this->givenAnAreasFiltersWithoutAnyAreaFilter();
        $this->thenReturnAnEmptyArray();
    }

    private function givenAnAreasFiltersWithoutAnyAreaFilter(): void
    {
        $this->areasFilter = new AreasFilter([]);
    }

    private function thenReturnAnEmptyArray(): void
    {
        $this->assertEquals(["areas" => []], $this->areasFilter->getFilterAsArray());
    }

    /** @test */
    public function shouldAreasFilterWhenHaveOneAreaFilterReturnArrayWithOneElement(): void
    {
        $this->givenAnAreasFiltersWithOneAreaFilter();
        $this->givenAnAreaFilter();
        $this->thenReturnArrayWithOneElement();
    }

    private function givenAnAreasFiltersWithOneAreaFilter(): void
    {
        $this->areasFilter = new AreasFilter([$this->areaFilter1]);
    }

    private function givenAnAreaFilter(): void
    {
        $this->areaFilter1->method("getFilterAsArray")->willReturn(["areaTypeId" => 101, "areaId" => 8019]);
    }

    private function thenReturnArrayWithOneElement(): void
    {
        $this->assertEquals(["areas" => [["areaTypeId" => 101, "areaId" => 8019]]],
            $this->areasFilter->getFilterAsArray());
    }

    /** @test */
    public function shouldAreasFilterWhenHaveTwoAreaFiltersReturnArrayWithTwoElements(): void
    {
        $this->givenAnAreasFiltersWithTwoAreaFilter();
        $this->givenTwoAreaFilters();
        $this->thenReturnArrayWithTwoElements();
    }

    private function givenAnAreasFiltersWithTwoAreaFilter(): void
    {
        $this->areasFilter = new AreasFilter([$this->areaFilter1, $this->areaFilter2]);
    }

    private function givenTwoAreaFilters(): void
    {
        $this->givenAnAreaFilter();
        $this->areaFilter2->method("getFilterAsArray")->willReturn(["areaTypeId" => 101, "areaId" => 8101]);
    }

    private function thenReturnArrayWithTwoElements(): void
    {
        $this->assertEquals([
            "areas" => [
                ["areaTypeId" => 101, "areaId" => 8019],
                ["areaTypeId" => 101, "areaId" => 8101]
            ]
        ],
            $this->areasFilter->getFilterAsArray());
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->areaFilter1 = $this->createMock(AreaFilter::class);
        $this->areaFilter2 = $this->createMock(AreaFilter::class);
    }
}
