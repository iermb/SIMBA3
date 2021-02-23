<?php

namespace Component\Application\Filter\Service;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Application\Filter\Service\CreateAreasFilter;
use SIMBA3\Component\Domain\Filter\Service\AreasFilter;

class CreateAreasFilterTest extends TestCase
{
    private CreateAreasFilter $createAreasFilter;

    /** @test */
    public function shouldCreateAreasFilterWhenRawFilterDontHaveAreasReturnAnEmptyAreasFilter(): void
    {
        $this->givenACreateAreasFilterWithoutAreasInformation();
        $this->thenCreateAreasFilterReturnAreasFilterWithEmtpyValues();
    }

    private function givenACreateAreasFilterWithoutAreasInformation(): void
    {
        $this->createAreasFilter = new CreateAreasFilter(["no_filter_information" => 32]);
    }

    public function thenCreateAreasFilterReturnAreasFilterWithEmtpyValues(): void
    {
        $this->assertEquals(["areas" => []], $this->createAreasFilter->getFilter()->getFilterAsArray());
    }

    /** @test */
    public function shouldCreateAreasFilterWhenRawFilterFormatIsNotCorrectReturnException(): void
    {
        $this->givenACreateAreasFilterWithAreasInformationWithWrongFormat();
        $this->thenExpectsInvalidArgumentException();
        $this->whenCallGetFilter();
    }

    private function givenACreateAreasFilterWithAreasInformationWithWrongFormat(): void
    {
        $this->createAreasFilter = new CreateAreasFilter(["areas" => [[23], [34], [22], [23]]]);
    }

    private function thenExpectsInvalidArgumentException(): void
    {
        $this->expectException(InvalidArgumentException::class);
    }

    private function whenCallGetFilter(): void
    {
        $this->createAreasFilter->getFilter();
    }

    /** @test */
    public function shouldCreateAreasFilterWhenValidRawFilterReturnArrayWithData(): void
    {
        $this->givenACreateAreasFilterWithAreasInformation();
        $this->thenReturnAreasFilter();
    }

    private function givenACreateAreasFilterWithAreasInformation(): void
    {
        $this->createAreasFilter = new CreateAreasFilter([
            "areas" => [[101, 8019], [101, 8015], [102, 9]],
            "years" => [2020, 2019]
        ]);
    }

    private function thenReturnAreasFilter(): void
    {
        $this->assertInstanceOf(AreasFilter::class, $this->createAreasFilter->getFilter());
        $this->assertEquals([
            "areas" => [
                ["typeAreaId" => 101, "areaId" => 8019],
                ["typeAreaId" => 101, "areaId" => 8015],
                ["typeAreaId" => 102, "areaId" => 9]
            ]
        ], $this->createAreasFilter->getFilter()->getFilterAsArray());
    }


}
