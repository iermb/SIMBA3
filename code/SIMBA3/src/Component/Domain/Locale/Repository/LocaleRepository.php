<?php

namespace SIMBA3\Component\Domain\Locale\Repository;

use SIMBA3\Component\Domain\Locale\Entity\Locale;

interface LocaleRepository
{
    public function getLocale(string $nameLocale): ?Locale;
}