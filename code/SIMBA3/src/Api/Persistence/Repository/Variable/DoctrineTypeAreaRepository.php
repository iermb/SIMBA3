<?php


namespace SIMBA3\Api\Persistence\Repository\Variable;


use Doctrine\ORM\EntityRepository;
use SIMBA3\Component\Domain\Variable\Entity\TypeArea;
use SIMBA3\Component\Domain\Variable\Repository\TypeAreaRepository;

class DoctrineTypeAreaRepository extends EntityRepository implements TypeAreaRepository
{
    private const ID_FIELD = "id";

    public function getTypeArea(int $TypeAreaId): ?TypeArea
    {
        return $this->findOneBy([self::ID_FIELD => $TypeAreaId]);
    }

    public function getAllTypeArea(): array
    {
        return $this->findAll();
    }
}