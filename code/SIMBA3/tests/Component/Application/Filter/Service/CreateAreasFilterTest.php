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

    private function thenCreateAreasFilterReturnAreasFilterWithEmtpyValues(): void
    {
        $this->assertEquals(["areas" => []], $this->createAreasFilter->getFilter()->getFilterAsArray());
    }

    /**
     * @dataProvider providerAreasFilterProvider
     * @test
     */
    public function shouldCreateAreasFilterWhenRawFilterFormatIsNotCorrectReturnAnEmptyAreasFilterTest(CreateAreasFilter $createAreasFilter): void
    {
        $this->assertEquals(["areas" => []], $createAreasFilter->getFilter()->getFilterAsArray());
    }

    public function providerAreasFilterProvider(): array
    {
        return [
            [new CreateAreasFilter(["areas"])],
            [new CreateAreasFilter(["areas" => 23])],
            [new CreateAreasFilter(["areas" => [23]])],
            [new CreateAreasFilter(["areas" => ['a' => 23]])],
            [new CreateAreasFilter(["areas" => [23,24,25]])],
            [new CreateAreasFilter(["areas" => ['23','24']])],
            [new CreateAreasFilter(["areas" => [[[23]]]])],
        ];
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
                ["typeAreaCode" => 101, "areaCode" => 8019],
                ["typeAreaCode" => 101, "areaCode" => 8015],
                ["typeAreaCode" => 102, "areaCode" => 9]
            ]
        ], $this->createAreasFilter->getFilter()->getFilterAsArray());
    }


}
