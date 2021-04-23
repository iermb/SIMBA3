<?php

namespace Component\Application\Filter\Service;

use SIMBA3\Component\Application\Filter\Service\CreateIndependentVariablesFilter;
use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Domain\Filter\Service\IndependentVariableFilter;
use SIMBA3\Component\Domain\Filter\Service\IndependentVariablesFilter;

class CreateIndependentVariablesFilterTest extends TestCase
{
    private CreateIndependentVariablesFilter $createIndependentVariableFilter;

    /** @test */
    public function shouldCreateIndependentVariableFilterWhenRawFilterDontHaveIndependentVariablesReturnAnEmptyIndependentVariablesFilter(): void
    {
        $this->givenAnEmptyCreateIndependentVariableFilter();
        $this->thenReturnEmptyIndependentVariableFilter();
    }

    private function givenAnEmptyCreateIndependentVariableFilter(): void
    {
        $this->createIndependentVariableFilter = new CreateIndependentVariablesFilter(['something' => 1], 'independentVariables1');
    }

    private function thenReturnEmptyIndependentVariableFilter(): void
    {
        $this->assertInstanceOf(IndependentVariablesFilter::class, $this->createIndependentVariableFilter->getFilter());
        $this->assertEquals(new IndependentVariablesFilter([],'independentVariables1'), $this->createIndependentVariableFilter->getFilter());
    }

    /**
     * @dataProvider providerIndependentVariableFilterProvider
     * @test
     */
    public function shouldCreateIndependentVariableFilterWhenRawFilterFormatIsNotCorrectReturnAnEmptyIndependentVariablesFilter(CreateIndependentVariablesFilter $createIndependentVariablesFilter): void
    {
        $this->assertInstanceOf(IndependentVariablesFilter::class, $createIndependentVariablesFilter->getFilter());
        $this->assertEquals(new IndependentVariablesFilter([],'independentVariables1'), $createIndependentVariablesFilter->getFilter());
    }

    public function providerIndependentVariableFilterProvider(): array
    {
        return [
            [new CreateIndependentVariablesFilter(["independentVariables1"], 'independentVariables1')],
            [new CreateIndependentVariablesFilter(["independentVariables1" => 23], 'independentVariables1')],
            [new CreateIndependentVariablesFilter(["independentVariables1" => [23]],'independentVariables1')],
            [new CreateIndependentVariablesFilter(["independentVariables1" => ['a' => 23]],'independentVariables1')],
            [new CreateIndependentVariablesFilter(["independentVariables1" => [23,24,25]],'independentVariables1')],
            [new CreateIndependentVariablesFilter(["independentVariables1" => ['23','24']],'independentVariables1')],
            [new CreateIndependentVariablesFilter(["independentVariables1" => [[[23]]]],'independentVariables1')],
        ];
    }

    /** @test */
    public function shouldCreateIndependentVariableFilterWhenRawFilterIsCorrectReturnArrayWithData(): void
    {
        $this->givenACreateIndependentVariableFilterWithIndependentVariableInformation();
        $this->thenReturnIndependentVariableFilter();
    }

    private function givenACreateIndependentVariableFilterWithIndependentVariableInformation(): void
    {
        $this->createIndependentVariableFilter = new CreateIndependentVariablesFilter(
            [
                'independentVariables2' => [[1,2],[3,4]],
                'something' => 1
            ],
            'independentVariables2'
        );
    }

    private function thenReturnIndependentVariableFilter(): void
    {
        $independentVariablesFilter = new IndependentVariablesFilter(
            [
            new IndependentVariableFilter(1,2),
            new IndependentVariableFilter(3,4)
            ],
            'independentVariables2');

        $this->assertInstanceOf(IndependentVariablesFilter::class, $this->createIndependentVariableFilter->getFilter());
        $this->assertEquals($independentVariablesFilter, $this->createIndependentVariableFilter->getFilter());
    }


}
