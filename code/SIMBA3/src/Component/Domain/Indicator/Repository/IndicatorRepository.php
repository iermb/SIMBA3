<?php


namespace SIMBA3\Component\Domain\Indicator\Repository;


use SIMBA3\Component\Domain\Indicator\Entity\Indicator;

interface IndicatorRepository
{
    public function getIndicator(int $indicatorId): ?Indicator;
}