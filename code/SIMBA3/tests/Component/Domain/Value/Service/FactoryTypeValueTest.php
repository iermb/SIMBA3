<?php

namespace SIMBA3\Component\Domain\Value\Service;

use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Domain\Value\Repository\AreaYearValueRepository;

class FactoryTypeValueTest extends TestCase
{
    private FactoryTypeValue $factoryTypeValue;
    private AreaYearValueRepository $areaYearValueRepository;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->areaYearValueRepository = $this->createMock(AreaYearValueRepository::class);
    }

    /** @test */
    public function shouldFactoryTypeValueExpectsErrorWhenNotExistsTheType(): void
    {
        $this->givenAFactoryTypeValue();
        $this->thenExpectsInvalidArgumentException();
        $this->whenGetObjectTypeValueNotExists();
    }

    /** @test */
    public function shouldFactoryTypeValueReturnAreaYearTypeValue(): void
    {
        $this->givenAFactoryTypeValue();
        $this->whenGetObjectTypeValueIsAreaYearValueThenReturnAreaYearTypeValue();
    }

    private function givenAFactoryTypeValue(): void
    {
        $this->factoryTypeValue = new FactoryTypeValue($this->areaYearValueRepository);
    }

    private function thenExpectsInvalidArgumentException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
    }

    private function whenGetObjectTypeValueNotExists(): void
    {
        $this->factoryTypeValue->getObjectTypeValue("NOT EXISTS");
    }

    private function whenGetObjectTypeValueIsAreaYearValueThenReturnAreaYearTypeValue(): void
    {
        $this->assertInstanceOf(
            AreaYearTypeValue::class,
            $this->factoryTypeValue->getObjectTypeValue("AREA_YEAR_VALUE")
        );
    }
}
