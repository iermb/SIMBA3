<?php


namespace SIMBA3\Component\Domain\Filter\Service;


class IndependentVariablesFilter implements FilterValues
{
    private const INDEPENDENT_VARIABLE_FIELD = "independentVariables";
    private array $independentVariableFilter;

    public function __construct(array $independentVariableFilter)
    {
        $this->independentVariableFilter = $independentVariableFilter;
    }

    public function getFilterAsArray(): array
    {
        return [self::INDEPENDENT_VARIABLE_FIELD => array_map(function (IndependentVariableFilter $independentVariableFilter) {
            return $independentVariableFilter->getFilterAsArray();
        }, $this->independentVariableFilter)];
    }
}