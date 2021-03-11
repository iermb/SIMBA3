<?php


namespace SIMBA3\Component\Application\Filter\Service;


use InvalidArgumentException;
use SIMBA3\Component\Domain\Filter\Service\IndependentVariableFilter;
use SIMBA3\Component\Domain\Filter\Service\IndependentVariablesFilter;

class CreateIndependentVariablesFilter implements CreateFilterValues
{
    private array $rawFilter;
    private string $idFilter;

    public function __construct(array $rawFilter, string $idFilter)
    {
        $this->rawFilter = $rawFilter;
        $this->idFilter = $idFilter;
    }

    public function getFilter(): IndependentVariablesFilter
    {
        if (!isset($this->rawFilter[$this->idFilter])) {
            return new IndependentVariablesFilter([], $this->idFilter);
        }

        return new IndependentVariablesFilter(array_map(array($this, "createIndependentVariableFilter"), $this->rawFilter[$this->idFilter]), $this->idFilter);
    }

    private function createIndependentVariableFilter(array $independentVariableFilter): IndependentVariableFilter
    {
        if (count($independentVariableFilter) != 2) {
            throw new InvalidArgumentException("Format IndependentVariable filter is not correct");
        }
        return new IndependentVariableFilter($independentVariableFilter[0], $independentVariableFilter[1]);
    }
}