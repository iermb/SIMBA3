<?php

namespace SIMBA3\Component\Domain\Variable\Service;

use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Domain\Filter\Service\IndicatorFilter;
use SIMBA3\Component\Domain\Filter\Service\YearsFilter;
use SIMBA3\Component\Domain\Value\Repository\YearValueRepository;

class YearTypeValueTest extends TestCase
{
    private YearTypeValue $yearTypeValue;
    private YearValueRepository $yearValueRepository;
    private IndicatorFilter $indicatorFilter;
    private YearsFilter $yearsFilter;

    protected function setUp(): void
    {
        parent::setUp();
        $this->yearValueRepository = $this->createMock(YearValueRepository::class);
        $this->indicatorFilter = $this->createMock(IndicatorFilter::class);
        $this->yearsFilter = $this->createMock(YearsFilter::class);
    }

    /** @test */
    public function shouldYearTypeValueReadYearTypeValueAndReturnYearTypeValueArray(): void
    {
        $this->givenAYearTypeValue();
        $this->thenExpectsGetValuesFromRepository();
        $this->thenReturnYearTypeValueArray();
    }

    private function givenAYearTypeValue(): void
    {
        $this->yearTypeValue = new YearTypeValue($this->yearValueRepository, $this->indicatorFilter, $this->yearsFilter);
    }

    private function thenExpectsGetValuesFromRepository(): void
    {
        $this->yearValueRepository->expects($this->once())->method("getValues");
    }

    private function thenReturnYearTypeValueArray(): void
    {
        $this->assertInstanceOf(YearTypeValueArray::class, $this->yearTypeValue->getTypeValueArray());
    }

}
