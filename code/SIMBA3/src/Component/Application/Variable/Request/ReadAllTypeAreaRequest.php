<?php

namespace SIMBA3\Component\Application\Variable\Request;

class ReadAllTypeAreaRequest
{
    private string $locale;

    public function __construct(string $locale)
    {
        $this->locale = $locale;
    }

    public function getLocale(): string
    {
        return  $this->locale;
    }
}