<?php


namespace SIMBA3\Component\Domain\Variable\Entity;


use SIMBA3\Component\Domain\Locale\Entity\Locale;

class TypeArea
{
    public const TYPE_AREA_ID_FIELD = "typeAreaId";

    private int $id;
    private string $name;
    private Locale $locale;

    public function __construct(
        string $name,
        Locale $locale
    ) {
        $this->name = $name;
        $this->locale = $locale;
    }

    public function getId(): int
    {
        return $this->id;
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