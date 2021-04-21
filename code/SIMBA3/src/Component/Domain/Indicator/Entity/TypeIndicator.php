<?php


namespace SIMBA3\Component\Domain\Indicator\Entity;


class TypeIndicator
{
    private int $id;
    private bool $hasArea;
    private bool $hasYear;
    private bool $hasMonth;
    private int $numIndependentVars;
    private string $valueType;

    public function getId(): int
    {
        return $this->id;
    }

    public function hasArea(): bool
    {
        return $this->hasArea;
    }

    public function hasYear(): bool
    {
        return $this->hasYear;
    }

    public function hasMonth(): bool
    {
        return $this->hasMonth;
    }

    public function getNumIndependentVars(): int
    {
        return $this->numIndependentVars;
    }

    public function getIdType(): string
    {
        return $this->valueType;
    }
}