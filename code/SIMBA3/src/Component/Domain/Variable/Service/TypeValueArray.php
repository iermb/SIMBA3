<?php


namespace SIMBA3\Component\Domain\Variable\Service;


use SIMBA3\Component\Domain\Filter\Service\AreaFilter;
use SIMBA3\Component\Domain\Filter\Service\IndependentVariableFilter;
use SIMBA3\Component\Domain\Filter\Service\YearFilter;

abstract class TypeValueArray
{
    protected const CODE_TYPE_AREA_FIELD = AreaFilter::TYPE_AREA_CODE_FIELD;
    protected const CODE_AREA_FIELD = AreaFilter::AREA_CODE_FIELD;
    protected const CODE_YEAR = YearFilter::YEAR_ID_FIELD;
    protected const TYPE_INDEPENDENT_VARIABLE_CODE_FIELD = IndependentVariableFilter::TYPE_INDEPENDENT_VARIABLE_CODE_FIELD;
    protected const INDEPENDENT_VARIABLE_CODE_FIELD = IndependentVariableFilter::INDEPENDENT_VARIABLE_CODE_FIELD;

    abstract public function getValuesAsArray(): array;

    abstract public function getValues(): array;

    public function getAreas(): array
    {
        return [];
    }

    public function getIndependentVariable(int $number): array
    {
        return [];
    }

    public function getYears(): array
    {
        return [];
    }

    protected function uniqueArray(array $values): array
    {
        return ArrayTool::uniqueAssociativeArray($values);
    }
}