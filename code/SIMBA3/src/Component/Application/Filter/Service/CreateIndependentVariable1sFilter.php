<?php


namespace SIMBA3\Component\Application\Filter\Service;


use InvalidArgumentException;
use SIMBA3\Component\Domain\Filter\Service\IndependentVariableFilter;
use SIMBA3\Component\Domain\Filter\Service\IndependentVariablesFilter;

class CreateIndependentVariable1sFilter implements CreateFilterValues
{
    private const INDEPENDENT_VARIABLE_FILTER = "independentVariable1s";
    private array $rawFilter;

    public function __construct(array $rawFilter)
    {
        $this->rawFilter = $rawFilter;
    }

    public function getFilter(): IndependentVariablesFilter
    {
        if (!isset($this->rawFilter[self::INDEPENDENT_VARIABLE_FILTER])) {
            return new IndependentVariablesFilter([]);
        }
        return new IndependentVariablesFilter(array_map(array($this, "createIndependentVariableFilter"), $this->rawFilter[self::INDEPENDENT_VARIABLE_FILTER]));
    }

    private function createIndependentVariableFilter(array $independentVariableFilter): IndependentVariableFilter
    {
        if (count($independentVariableFilter) != 2) {
            throw new InvalidArgumentException("Format IndependentVariable filter is not correct");
        }
        return new IndependentVariableFilter($independentVariableFilter[0], $independentVariableFilter[1]);
    }
}