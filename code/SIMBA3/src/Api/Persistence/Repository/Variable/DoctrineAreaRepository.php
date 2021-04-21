<?php


namespace SIMBA3\Api\Persistence\Repository\Variable;

use Doctrine\ORM\EntityRepository;
use SIMBA3\Component\Domain\Filter\Service\AreaFilter;
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

    public function getAreasByFilter(string $locale, array $filters): array
    {
        if(!count($filters)) {
            return [];
        }

        $dql = 'SELECT a FROM SIMBA3\Component\Domain\Variable\Entity\Area a JOIN a.typeArea t ';
        $dql .= 'WHERE t.language = :language ';

        $dql .= 'AND (' . implode(' OR ', array_map(function ($area) {
            return '(t.code = ' . $area[AreaFilter::TYPE_AREA_CODE_FIELD] . " AND a.code = " . $area[AreaFilter::AREA_CODE_FIELD] . ")";
        }, $filters)) . ')';

        $query = $this->getEntityManager()->createQuery($dql);
        $query->setParameter('language', $locale);
        return $query->getResult();
    }
}