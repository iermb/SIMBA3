<?php

namespace SIMBA3\Component\Domain\Value\Service;

use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Domain\Value\Repository\AreaYearValueRepository;

class AreaYearTypeValueTest extends TestCase
{
    private AreaYearTypeValue $areaYearTypeValue;
    private AreaYearValueRepository $areaYearValueRepository;

    protected function setUp(): void
    {
        parent::setUp();
        $this->areaYearValueRepository = $this->createMock(AreaYearValueRepository::class);
    }

    /** @test */
    public function shouldAreaYearTypeValueReturnTypeValueArray(): void
    {
        $this->givenAnAreaYearTypeValue();
        $this->thenReturnTypeValueArray();
    }

    public function givenAnAreaYearTypeValue(): void
    {
        $this->areaYearTypeValue = new AreaYearTypeValue($this->areaYearValueRepository);
    }

    public function thenReturnTypeValueArray(): void
    {
        $typeIndicatorId = 1;
        
        $this->assertInstanceOf(TypeValueArray::class, $this->areaYearTypeValue->getTypeValueArray($typeIndicatorId));
    }
}
