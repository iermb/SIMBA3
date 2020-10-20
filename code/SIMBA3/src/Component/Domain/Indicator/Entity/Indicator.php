<?php


namespace SIMBA3\Component\Domain\Indicator\Entity;


class Indicator
{
    private int $id;
    private string $name;
    private string $description;
    private string $units;
    private string $note;
    private string $font;
    private string $methodology;
    private int $decimals;
    private int $typeIndicator;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->getDescription;
    }

    public function getUnits(): string
    {
        return $this->units;
    }

    public function getNote(): string
    {
        return $this->note;
    }

    public function getFont(): string
    {
        return $this->font;
    }

    public function getMethodology(): string
    {
        return $this->methodology;
    }
}