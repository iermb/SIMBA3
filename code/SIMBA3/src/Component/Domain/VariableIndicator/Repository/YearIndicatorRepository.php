<?php


namespace SIMBA3\Component\Domain\VariableIndicator\Repository;


interface YearIndicatorRepository
{
    public function getYearsIndicatorByIndicator(int $indicatorId): array;
}