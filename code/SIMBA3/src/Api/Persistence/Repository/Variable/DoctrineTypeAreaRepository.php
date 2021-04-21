<?php


namespace SIMBA3\Api\Persistence\Repository\Variable;


use Doctrine\ORM\EntityRepository;
use SIMBA3\Component\Domain\Variable\Entity\TypeArea;
use SIMBA3\Component\Domain\Variable\Repository\TypeAreaRepository;

class DoctrineTypeAreaRepository extends EntityRepository implements TypeAreaRepository
{
    private const CODE_FIELD = "code";
    private const LANGUAGE_ID_FIELD = "language";

    public function getTypeArea(string $locale, int $code): ?TypeArea
    {
        return $this->findOneBy([
            self::CODE_FIELD => $code,
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