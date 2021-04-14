<?php


namespace SIMBA3\Component\Domain\Value\Entity;

class AreaIndependentVariable1YearValue
{
    private int    $indicatorId;
    private int    $typeAreaCode;
    private int    $areaCode;
    private int    $typeIndependentVariable1Code;
    private int    $independentVariable1Code;
    private int    $year;
    private float  $value;
    private bool   $isPublic;
    private string $noteValue;

    public function getIndicatorId(): int
    {
        return $this->indicatorId;
    }

    public function getTypeAreaCode(): int
    {
        return $this->typeAreaCode;
    }

    public function getAreaCode(): int
    {
        return $this->areaCode;
    }

    public function getTypeIndependentVariable1Code(): int
    {
        return $this->typeIndependentVariable1Code;
    }

    public function getIndependentVariable1Code(): int
    {
        return $this->independentVariable1Code;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function getValue(): float
    {
        return $this->value;
    }

    public function getIsPublic(): bool
    {
        return $this->isPublic;
    }

    public function getNoteValue(): string
    {
        return $this->noteValue;
    }

}