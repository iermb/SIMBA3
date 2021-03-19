<?php


namespace SIMBA3\Component\Application\Variable\Request;


use SIMBA3\Component\Domain\Locale\Entity\Locale;

class ReadAllAreaTypeAreaRequest
{
    private Locale $locale;
    private int $typeAreaId;

    public function __construct(Locale $locale, int $typeAreaId)
    {
        $this->locale = $locale;
        $this->typeAreaId = $typeAreaId;
    }

    public function getTypeAreaId(): int
    {
        return $this->typeAreaId;
    }

    public function getLocale(): Locale
    {
        return $this->locale;
    }
}