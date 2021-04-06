<?php


namespace SIMBA3\Api\Persistence\Repository\Variable;


use Doctrine\ORM\EntityRepository;
use SIMBA3\Component\Domain\Variable\Entity\TypeArea;
use SIMBA3\Component\Domain\Variable\Repository\TypeAreaRepository;

class DoctrineTypeAreaRepository extends EntityRepository implements TypeAreaRepository
{
    private const ID_FIELD = "typeAreaId";
    private const LOCALE_ID_FIELD = "locale";

    public function getTypeArea(string $locale, int $typeAreaId): ?TypeArea
    {
        return $this->findOneBy([
            self::ID_FIELD => $typeAreaId,
            self::LOCALE_ID_FIELD => $locale
        ]);
    }

    public function getAllTypeArea(string $locale): array
    {
        return $this->findBy([
            self::LOCALE_ID_FIELD => $locale,
        ]);
    }
}