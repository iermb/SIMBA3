<?php


namespace SIMBA3\Component\Domain\Indicator\Entity;


class Indicator
{
    private int $id;
    private string $name;
    private ?string $description;
    private ?string $units;
    private ?string $note;
    private ?string $font;
    private ?string $methodology;
    private int $decimals;
    private TypeIndicator $typeIndicator;

    public function __construct(
        string $name,
        string $description,
        string $units,
        string $note,
        string $font,
        string $methodology,
        int $decimals,
        TypeIndicator $typeIndicator
    ) {
        $this->name = $name;
        $this->description = $description;
        $this->units = $units;
        $this->note = $note;
        $this->font = $font;
        $this->methodology = $methodology;
        $this->decimals = $decimals;
        $this->typeIndicator = $typeIndicator;
    }

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
        if (is_null($this->description)) {
            return '';
        }

        return $this->description;
    }

    public function getUnits(): string
    {
        if (is_null($this->units)) {
            return '';
        }

        return $this->units;
    }

    public function getNote(): string
    {
        if (is_null($this->note)) {
            return '';
        }

        return $this->note;
    }

    public function getFont(): string
    {
        if (is_null($this->font)) {
            return '';
        }

        return $this->font;
    }

    public function getMethodology(): string
    {
        if (!isset($this->methodology)) {
            return "";
        }
        return $this->methodology;
    }

    public function getTypeIndicator(): TypeIndicator
    {
        return $this->typeIndicator;
    }
}