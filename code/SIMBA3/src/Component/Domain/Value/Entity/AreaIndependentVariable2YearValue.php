<?php


namespace SIMBA3\Component\Domain\Value\Entity;

class AreaIndependentVariable2YearValue
{
    private int    $indicatorId;
    private int    $typeAreaCode;
    private int    $areaCode;
    private int    $typeIndependentVariable1Code;
    private int    $independentVariable1Code;
    private int    $typeIndependentVariable2Code;
    private int    $independentVariable2Code;
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

    public function getTypeIndependentVariable2Code(): int
    {
        return $this->typeIndependentVariable2Code;
    }

    public function getIndependentVariable2Code(): int
    {
        return $this->independentVariable2Code;
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