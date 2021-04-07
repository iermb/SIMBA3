<?php


namespace SIMBA3\Component\Domain\Variable\Entity;


use SIMBA3\Component\Domain\Locale\Entity\Locale;

class TypeArea
{
    public const TYPE_AREA_ID_FIELD = "typeAreaId";

    private int $id;
    private int $typeAreaId;
    private string $language;
    private string $name;

    public function __construct(
        int $typeAreaId,
        string $name,
        string $locale
    ) {
        $this->typeAreaId = $typeAreaId;
        $this->name = $name;
        $this->language = $locale;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTypeAreaId(): int
    {
        return $this->typeAreaId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLanguage(): string
    {
        return $this->language;
    }
}