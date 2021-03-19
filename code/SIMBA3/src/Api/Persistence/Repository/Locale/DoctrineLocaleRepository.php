<?php

namespace SIMBA3\Api\Persistence\Repository\Locale;

use Doctrine\ORM\EntityRepository;
use SIMBA3\Component\Domain\Locale\Repository\LocaleRepository;
use SIMBA3\Component\Domain\Locale\Entity\Locale;

class DoctrineLocaleRepository extends EntityRepository implements LocaleRepository
{
    private const NAME_FIELD = "name";

    public function getLocale(string $nameLocale): ?Locale
    {
        return $this->findOneBy([self::NAME_FIELD => $nameLocale]);
    }
}