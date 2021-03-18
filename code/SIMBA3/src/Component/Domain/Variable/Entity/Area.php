<?php


namespace SIMBA3\Component\Domain\Variable\Entity;


class Area
{
    public const AREA_ID_FIELD = "areaId";

    private int $id;
    private TypeArea $typeArea;
    private string $name;
    private string $language;

    public function __construct(
        TypeArea $typeArea,
        string $name,
        string $language
    ) {
        $this->typeArea = $typeArea;
        $this->name = $name;
        $this->language = $language;
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

    public function getLanguage(): string
    {
        return $this->language;
    }
}