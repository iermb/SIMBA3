<?php

namespace SIMBA3\Component\Domain\Value\Service;

class CollectionVariables
{
    private array $areaArray = [];
    private array $yearArray = [];
    private array $independentVariableArray = [];

    public function addArea(FactArea $area): void
    {
        $this->areaArray[] = $area;
    }

    public function addYear(FactYear $year): void
    {
        $this->yearArray[] = $year;
    }

    public function addIndependentVariable(int $id, FactIndependentVariable $independentVariable): void{

        if (!isset($this->independentVariableArray[$id])) {
            $this->independentVariableArray[$id] = [];
        }

        $this->independentVariableArray[$id][] = $independentVariable;
    }

    /**
     * @return array
     */
    public function getAreas(): array
    {
        return $this->areaArray;
    }

    /**
     * @return array
     */
    public function getYears(): array
    {
        return $this->yearArray;
    }

    /**
     * @return array
     */
    public function getIndependentVariables(int $id): array
    {
        return $this->independentVariableArray[$id];
    }


}