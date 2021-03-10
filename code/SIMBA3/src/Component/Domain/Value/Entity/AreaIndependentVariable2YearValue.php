<?php


namespace SIMBA3\Component\Domain\Value\Entity;

class AreaIndependentVariable2YearValue
{
    private int    $indicatorId;
    private int    $typeAreaId;
    private int    $areaId;
    private int    $typeIndependentVariable1;
    private int    $independentVariable1;
    private int    $typeIndependentVariable2;
    private int    $independentVariable2;
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

    public function getTypeIndependentVariable1id(): int
    {
        return $this->typeIndependentVariable1;
    }

    public function getIndependentVariable1Id(): int
    {
       return $this->independentVariable1;
    }

    public function getTypeIndependentVariable2id(): int
    {
        return $this->typeIndependentVariable2;
    }

    public function getIndependentVariable2Id(): int
    {
        return $this->independentVariable2;
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