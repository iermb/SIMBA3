<?php


namespace SIMBA3\Component\Domain\Indicator\Entity;


class IndicatorTranslation
{
    private Indicator $indicator;
    private string $language;
    private string $name;
    private ?string $description;
    private ?string $units;
    private ?string $note;
    private ?string $font;
    private ?string $methodology;

    public function __construct(
        Indicator $indicator,
        string $language,
        string $name,
        string $description,
        string $units,
        string $note,
        string $font,
        string $methodology
    ) {
        $this->indicator = $indicator;
        $this->language = $language;
        $this->name = $name;
        $this->description = $description;
        $this->units = $units;
        $this->note = $note;
        $this->font = $font;
        $this->methodology = $methodology;
    }

    public function getIndicator(): Indicator
    {
        return $this->indicator;
    }

    public function getLanguage(): string
    {
        return $this->language;
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
}