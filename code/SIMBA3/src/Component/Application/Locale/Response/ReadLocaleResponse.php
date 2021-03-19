<?php

namespace SIMBA3\Component\Application\Locale\Response;

use SIMBA3\Component\Domain\Locale\Entity\Locale;

class ReadLocaleResponse
{
    private Locale $locale;

    public function __construct(Locale $locale)
    {
        $this->locale = $locale;
    }

    public function getLocale(): Locale
    {
        return $this->locale;
    }
}