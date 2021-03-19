<?php


namespace SIMBA3\Component\Domain\Variable\Entity;


use SIMBA3\Component\Domain\Locale\Entity\Locale;

class Area
{
    public const AREA_ID_FIELD = "areaId";

    private int $id;
    private TypeArea $typeArea;
    private string $name;
    private Locale $locale;

    public function __construct(
        TypeArea $typeArea,
        string $name,
        Locale $locale
    ) {
        $this->typeArea = $typeArea;
        $this->name = $name;
        $this->locale = $locale;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getType(): TypeArea
    {
        return $this->typeArea;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLocale(): Locale
    {
        return $this->locale;
    }
}