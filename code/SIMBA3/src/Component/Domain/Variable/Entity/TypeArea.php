<?php


namespace SIMBA3\Component\Domain\Variable\Entity;


class TypeArea
{
    private int $id;
    private string $name;
    private string $language;

    public function __construct(
        string $name,
        string $language
    ) {
        $this->name = $name;
        $this->language = $language;
    }

    public function getId(): int
    {
        return $this->id;
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