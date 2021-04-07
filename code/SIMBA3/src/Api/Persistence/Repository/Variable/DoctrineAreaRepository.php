<?php


namespace SIMBA3\Api\Persistence\Repository\Variable;


use Doctrine\ORM\EntityRepository;
use SIMBA3\Component\Domain\Variable\Repository\AreaRepository;

class DoctrineAreaRepository extends EntityRepository implements AreaRepository
{
    public function getAllAreaByTypeArea(string $locale, int $typeAreaId): array
    {
        $dql = "SELECT a FROM SIMBA3\Component\Domain\Variable\Entity\Area a JOIN a.typeArea t";
        $dql .= " WHERE t.language = :language AND t.id = " . $typeAreaId;
        $query = $this->getEntityManager()->createQuery($dql);
        $query->setParameter('language', $locale);
        return $query->getResult();
    }

    public function getAreasByFilter(string $locale, array $areaUniqueIds): array
    {
        $dql = 'SELECT a FROM SIMBA3\Component\Domain\Variable\Entity\Area a JOIN a.typeArea t ';
        $dql .= 'WHERE t.language = :language ';

        if(count($areaUniqueIds)) {
            $dql .= 'AND (' . implode(' OR ', array_map(function ($area) {
                    return '(a.typeArea = ' . $area['typeAreaId'] . " AND a.id = " . $area["areaId"] . ")";
                }, $areaUniqueIds)) . ')';
        }

        $query = $this->getEntityManager()->createQuery($dql);
        $query->setParameter('language', $locale);

        return $query->getResult();
    }
}