<?php


namespace SIMBA3\Component\Domain\Value\Entity;

class AreaIndependentVariable2YearValue
{
    private int    $indicatorId;
    private int    $typeAreaId;
    private int    $areaId;
    private int    $typeIndependentVariable1Id;
    private int    $independentVariable1Id;
    private int    $typeIndependentVariable2Id;
    private int    $independentVariable2Id;
    private int    $year;
    private float  $value;
    private bool   $isPublic;
    private string $noteValue;

    public function getIndicatorId(): int
    {
        return $this->indicatorId;
    }

    public function getTypeAreaId(): int
    {
        return $this->typeAreaId;
    }

    public function getAreaId(): int
    {
        return $this->areaId;
    }

    public function getTypeIndependentVariable1Id(): int
    {
        return $this->typeIndependentVariable1Id;
    }

    public function getIndependentVariable1Id(): int
    {
       return $this->independentVariable1Id;
    }

    public function getTypeIndependentVariable2Id(): int
    {
        return $this->typeIndependentVariable2Id;
    }

    public function getIndependentVariable2Id(): int
    {
        return $this->independentVariable2Id;
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