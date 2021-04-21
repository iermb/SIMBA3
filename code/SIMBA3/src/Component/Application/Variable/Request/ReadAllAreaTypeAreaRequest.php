<?php


namespace SIMBA3\Component\Application\Variable\Request;


class ReadAllAreaTypeAreaRequest
{
    private string $locale;
    private int $code;

    public function __construct(string $locale, int $code)
    {
        $this->locale = $locale;
        $this->code = $code;
    }

    public function getCode(): int
    {
        return $this->code;
    }

    public function getLocale(): string
    {
        return $this->locale;
    }
}