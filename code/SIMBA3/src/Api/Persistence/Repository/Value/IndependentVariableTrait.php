<?php

namespace SIMBA3\Api\Persistence\Repository\Value;

use SIMBA3\Component\Domain\Filter\Service\IndependentVariableFilter;

trait IndependentVariableTrait
{
    private static function getDQLIndependentVariable(int $independentVariableId, array $filter): string
    {
        $keyFilter = "independentVariable{$independentVariableId}s";

        if (!isset($filter[$keyFilter]) || 1 > count($filter[$keyFilter])) {
            return '';
        }

        return " AND (" . implode(" OR ", array_map(function($independentVariable) use ($independentVariableId) {
            return "(v.typeIndependentVariable{$independentVariableId}Code = " . $independentVariable[IndependentVariableFilter::TYPE_INDEPENDENT_VARIABLE_CODE_FIELD] . " AND v.independentVariable{$independentVariableId}Code = " . $independentVariable[IndependentVariableFilter::INDEPENDENT_VARIABLE_CODE_FIELD] . ")";
        }, $filter[$keyFilter])) . ")";
    }
}