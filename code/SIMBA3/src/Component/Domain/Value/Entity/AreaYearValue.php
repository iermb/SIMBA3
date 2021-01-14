<?php


namespace SIMBA3\Component\Domain\Value\Entity;


class AreaYearValue
{
    private int $indicatorId;
    private int $areaTypeId;
    private int $areaId;
    private int $year;
    private float $value;
    private bool $isPublic;
    private string $noteValue;

    public function getIndicatorId(): int
    {
        return $this->indicatorId;
    }

    public function getAreaTypeId(): int
    {
        return $this->areaTypeId;
    }

    public function getAreaId(): int
    {
        return $this->areaId;
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