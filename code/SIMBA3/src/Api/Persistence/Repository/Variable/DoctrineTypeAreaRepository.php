<?php


namespace SIMBA3\Api\Persistence\Repository\Variable;


use Doctrine\ORM\EntityRepository;
use SIMBA3\Component\Domain\Locale\Entity\Locale;
use SIMBA3\Component\Domain\Variable\Entity\TypeArea;
use SIMBA3\Component\Domain\Variable\Repository\TypeAreaRepository;

class DoctrineTypeAreaRepository extends EntityRepository implements TypeAreaRepository
{
    private const ID_FIELD = "id";
    private const LOCALE_ID_FIELD = "localeId";

    public function getTypeArea(Locale $locale, int $TypeAreaId): ?TypeArea
    {
        return $this->findOneBy([
            self::ID_FIELD => $TypeAreaId,
            self::LOCALE_ID_FIELD => $locale->getId(),
        ]);
    }

    public function getAllTypeArea(Locale $locale): array
    {
        return $this->findBy([
            self::LOCALE_ID_FIELD => $locale->getId(),
        ]);
    }
}