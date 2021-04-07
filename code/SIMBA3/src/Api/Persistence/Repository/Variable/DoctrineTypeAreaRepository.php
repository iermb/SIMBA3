<?php


namespace SIMBA3\Api\Persistence\Repository\Variable;


use Doctrine\ORM\EntityRepository;
use SIMBA3\Component\Domain\Variable\Entity\TypeArea;
use SIMBA3\Component\Domain\Variable\Repository\TypeAreaRepository;

class DoctrineTypeAreaRepository extends EntityRepository implements TypeAreaRepository
{
    private const ID_FIELD = "typeAreaId";
    private const LANGUAGE_ID_FIELD = "language";

    public function getTypeArea(string $locale, int $typeAreaId): ?TypeArea
    {
        return $this->findOneBy([
            self::ID_FIELD => $typeAreaId,
            self::LANGUAGE_ID_FIELD => $locale
        ]);
    }

    public function getAllTypeArea(string $locale): array
    {
        return $this->findBy([
            self::LANGUAGE_ID_FIELD => $locale,
        ]);
    }
}