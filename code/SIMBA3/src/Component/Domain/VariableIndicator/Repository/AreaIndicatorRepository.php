<?php


namespace SIMBA3\Component\Domain\VariableIndicator\Repository;


interface AreaIndicatorRepository
{
    public function getAreasIndicatorByIndicator(int $indicatorId): array;
}