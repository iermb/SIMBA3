<?php


namespace SIMBA3\Component\Domain\Indicator\Entity;


class TypeIndicator
{
    private int $id;
    private bool $hasArea;
    private bool $hasYear;
    private bool $hasMonth;
    private int $numIndependentVars;

    public function getId(): int
    {
        return $this->id;
    }

    public function getHasArea(): bool
    {
        return $this->hasArea;
    }

    public function getHasYear(): bool
    {
        return $this->hasYear;
    }

    public function getHasMonth(): bool
    {
        return $this->hasMonth;
    }

    public function getNumIndependentVars(): int
    {
        return $this->numIndependentVars;
    }

    public function getIdType(): string
    {
        return "AREA_YEAR_VALUE";
    }
}