<?php


namespace SIMBA3\Component\Domain\Value\Entity;

use SIMBA3\Component\Domain\Area\Entity\TypeArea;
use SIMBA3\Component\Domain\Area\Entity\Area;
class AreaYearValue
{
    private int $indicatorId;
    private TypeArea $typeArea;
    private Area $area;
    private int $year;
    private float $value;
    private bool $isPublic;
    private string $noteValue;

    public function getIndicatorId(): int
    {
        return $this->indicatorId;
    }

    public function getTypeArea(): TypeArea
    {
        return $this->typeArea;
    }

    public function getArea(): Area
    {
        return $this->area;
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