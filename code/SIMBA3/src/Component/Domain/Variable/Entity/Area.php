<?php


namespace SIMBA3\Component\Domain\Variable\Entity;

class Area
{
    private int $code;
    private TypeArea $typeArea;
    private string $name;

    public function __construct(
        TypeArea $typeArea,
        string $name
    ) {
        $this->typeArea = $typeArea;
        $this->name = $name;
    }

    public function getCode(): int
    {
        return $this->code;
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