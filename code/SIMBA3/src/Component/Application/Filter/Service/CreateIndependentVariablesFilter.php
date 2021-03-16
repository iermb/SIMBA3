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

        if (!is_array($this->rawFilter[$this->idFilter])) {
            return new IndependentVariablesFilter([], $this->idFilter);
        }

        $this->rawFilter[$this->idFilter] = array_filter($this->rawFilter[$this->idFilter], function($element){
            if (!is_array($element)) {
                return false;
            }
            if(count($element) != 2) {
                return false;
            }
            if( !is_int($element[0]) || !is_int($element[1])) {
                return false;
            }

            return true;
        });

        return new IndependentVariablesFilter(array_map(array($this, "createIndependentVariableFilter"), $this->rawFilter[$this->idFilter]), $this->idFilter);
    }

    private function createIndependentVariableFilter(array $independentVariableFilter): IndependentVariableFilter
    {
        return new IndependentVariableFilter($independentVariableFilter[0], $independentVariableFilter[1]);
    }
}