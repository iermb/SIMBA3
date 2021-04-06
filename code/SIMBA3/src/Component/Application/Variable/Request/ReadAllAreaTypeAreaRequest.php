<?php


namespace SIMBA3\Component\Application\Variable\Request;


class ReadAllAreaTypeAreaRequest
{
    private string $locale;
    private int $typeAreaId;

    public function __construct(string $locale, int $typeAreaId)
    {
        $this->locale = $locale;
        $this->typeAreaId = $typeAreaId;
    }

    public function getTypeAreaId(): int
    {
        return $this->typeAreaId;
    }

    public function getLocale(): string
    {
        return $this->locale;
    }
}