<?php


namespace SIMBA3\Api\Persistence\Repository\Value;


use Doctrine\ORM\EntityRepository;
use SIMBA3\Component\Domain\Value\Repository\YearValueRepository;

class DoctrineYearValueRepository extends EntityRepository implements YearValueRepository
{

    public function getValues(array $filter): array
    {
        $dql = 'SELECT v FROM SIMBA3\Component\Domain\Value\Entity\YearValue v WHERE v.indicatorId = :indicatorId';
        if (isset($filter["years"]) && count($filter["years"]) > 0) {
            $dql .= " AND (" . implode(" OR ", array_map(function($year) {
                    return "v.year = " . $year["year"];
                }, $filter["years"])) . ")";
        }
        $query = $this->getEntityManager()->createQuery($dql)->setParameter('indicatorId', $filter["indicatorId"]);
        return $query->getResult();
    }
}