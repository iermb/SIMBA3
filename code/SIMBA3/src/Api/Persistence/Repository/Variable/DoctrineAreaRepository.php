<?php


namespace SIMBA3\Api\Persistence\Repository\Variable;


use Doctrine\ORM\EntityRepository;
use SIMBA3\Component\Domain\Variable\Entity\Area;
use SIMBA3\Component\Domain\Variable\Repository\AreaRepository;

class DoctrineAreaRepository extends EntityRepository implements AreaRepository
{
    private const ID_FIELD = "id";
    private const TYPE_AREA_FIELD = "typeArea";

    public function getArea(int $areaId): ?Area
    {
        return $this->findOneBy([self::ID_FIELD => $areaId]);
    }

    public function getAllAreaByTypeArea(int $typeAreaId): array
    {
        return $this->findBy([self::TYPE_AREA_FIELD => $typeAreaId]);
    }

    public function getAreasByFilter(array $areaUniqueIds): array
    {
        $dql = 'SELECT a FROM SIMBA3\Component\Domain\Variable\Entity\Area a ';
        $dql .= ' WHERE ' . implode(' OR ', array_map(function($area) {
                return '(a.typeArea = ' . $area['typeAreaId'] . " AND a.id = " . $area["areaId"] . ")";
            }, $areaUniqueIds));
        $query = $this->getEntityManager()->createQuery($dql);
        return $query->getResult();
    }
}