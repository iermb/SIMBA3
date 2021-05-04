<?php


namespace SIMBA3\Component\Domain\VariableIndicator\Entity;


use SIMBA3\Component\Domain\Indicator\Entity\Indicator;

class AreaIndicator
{
    private Indicator $indicator;
    private int $typeAreaCode;
    private int $areaCode;

    public function getTypeAreaCode(): int
    {
        return $this->typeAreaCode;
    }

    public function getAreaCode(): int
    {
        return $this->areaCode;
    }

}