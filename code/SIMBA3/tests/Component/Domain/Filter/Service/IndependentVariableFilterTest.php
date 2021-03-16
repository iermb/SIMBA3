<?php

namespace Component\Domain\Filter\Service;

use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Domain\Filter\Service\IndependentVariableFilter;

class IndependentVariableFilterTest extends TestCase
{
    private IndependentVariableFilter $independentVariableFilter;

    /** @test */
    public function shouldIndependentVariableFilterReturnArrayWithValues(): void
    {
        $this->givenIndependentVariableFilterWithTypeIndependentVariableIdAndIndependentVariableId();
        $this->thenReturnArrayWithValues();
    }

    private function givenIndependentVariableFilterWithTypeIndependentVariableIdAndIndependentVariableId(): void
    {
        $this->independentVariableFilter = new IndependentVariableFilter(100,200);
    }

    private function thenReturnArrayWithValues(): void
    {
        $this->assertEquals(
            [
               "typeIndependentVariableId" => 100,
                "independentVariableId" => 200,
            ],
            $this->independentVariableFilter->getFilterAsArray()
        );
    }
}