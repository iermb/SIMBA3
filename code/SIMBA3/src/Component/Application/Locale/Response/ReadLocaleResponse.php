<?php

namespace SIMBA3\Component\Application\Locale\Response;

class ReadLocaleResponse
{
    private string $locale;

    public function __construct(string $locale)
    {
        $this->locale = $locale;
    }

    public function getLocale(): string
    {
        return $this->locale;
    }
}