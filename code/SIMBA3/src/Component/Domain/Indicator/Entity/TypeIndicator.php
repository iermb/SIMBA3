<?php


namespace SIMBA3\Component\Domain\Indicator\Entity;


class TypeIndicator
{
    private int $id;
    private bool $area;
    private bool $year;
    private bool $month;
    private int $numIndependentVars;

    public function getHasArea(): bool
    {
        return $this->area;
    }

    public function getHasYear(): bool
    {
        return $this->year;
    }

    public function getHasMonth(): bool
    {
        return $this->month;
    }

    public function getNumIndependentVars(): int
    {
        return $this->numIndependentVars;
    }
}