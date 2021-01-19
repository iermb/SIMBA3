<?php


namespace SIMBA3\Api\Persistence\Repository\Area;


use Doctrine\ORM\EntityRepository;
use SIMBA3\Component\Domain\Area\Entity\Area;
use SIMBA3\Component\Domain\Area\Repository\AreaRepository;

class DoctrineAreaRepository extends EntityRepository implements AreaRepository
{
    private const ID_FIELD = "id";
    private const TYPE_AREA_FIELD = "type_id";

    public function getArea(int $areaId): ?Area
    {
        return $this->findOneBy([self::ID_FIELD => $areaId]);
    }

    public function getAllAreaByTypeArea(int $typeAreaId): array
    {
        return $this->findBy([self::TYPE_AREA_FIELD => $typeAreaId]);
    }
}