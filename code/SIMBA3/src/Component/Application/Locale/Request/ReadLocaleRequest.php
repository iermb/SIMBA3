<?php


namespace SIMBA3\Component\Application\Locale\Request;


class ReadLocaleRequest
{
    private string $nameLocale;

    public function __construct(string $nameLocale)
    {
        $this->nameLocale = $nameLocale;
    }

    public function getNameLocale(): string
    {
        return $this->nameLocale;
    }
}