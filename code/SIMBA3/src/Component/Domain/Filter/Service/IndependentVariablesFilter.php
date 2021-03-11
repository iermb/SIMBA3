<?php


namespace SIMBA3\Component\Domain\Filter\Service;


class IndependentVariablesFilter implements FilterValues
{
    private array $independentVariableFilter;
    private string $idFilter;

    public function __construct(array $independentVariableFilter, string $idFilter)
    {
        $this->independentVariableFilter = $independentVariableFilter;
        $this->idFilter = $idFilter;
    }

    public function getFilterAsArray(): array
    {
        return [$this->idFilter => array_map(function (IndependentVariableFilter $independentVariableFilter) {
            return $independentVariableFilter->getFilterAsArray();
        }, $this->independentVariableFilter)];
    }
}