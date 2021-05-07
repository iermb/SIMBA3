<?php


namespace SIMBA3\Component\Domain\VariableIndicator\Entity;


use SIMBA3\Component\Domain\Indicator\Entity\Indicator;

class YearIndicator
{
    private Indicator $indicator;
    private int $year;

    public function getYear(): int
    {
        return $this->year;
    }

}