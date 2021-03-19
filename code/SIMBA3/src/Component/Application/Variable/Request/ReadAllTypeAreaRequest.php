<?php


namespace SIMBA3\Component\Application\Variable\Request;


use SIMBA3\Component\Domain\Locale\Entity\Locale;

class ReadAllTypeAreaRequest
{
    private Locale $locale;

    public function __construct(Locale $locale)
    {
        $this->locale = $locale;
    }

    public function getLocale(): Locale
    {
        return  $this->locale;
    }
}