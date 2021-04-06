<?php


namespace SIMBA3\Component\Domain\Variable\Entity;


use SIMBA3\Component\Domain\Locale\Entity\Locale;

class Area
{
    public const AREA_ID_FIELD = "areaId";

    private int $id;
    private TypeArea $typeArea;
    private string $name;

    public function __construct(
        TypeArea $typeArea,
        string $name
    ) {
        $this->typeArea = $typeArea;
        $this->name = $name;
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
}