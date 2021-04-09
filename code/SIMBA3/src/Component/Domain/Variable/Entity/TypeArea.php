<?php


namespace SIMBA3\Component\Domain\Variable\Entity;

class TypeArea
{
    public const TYPE_AREA_CODE_FIELD = "typeAreaCode";

    private int $id;
    private string $language;
    private int $code;
    private string $name;

    public function __construct(
        string $language,
        int $code,
        string $name
    ) {
        $this->language = $language;
        $this->code = $code;
        $this->name = $name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getLanguage(): string
    {
        return $this->language;
    }

    public function getCode(): int
    {
        return $this->code;
    }

    public function getName(): string
    {
        return $this->name;
    }
}