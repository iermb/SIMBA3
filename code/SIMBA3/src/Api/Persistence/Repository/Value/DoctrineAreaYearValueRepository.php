<?php


namespace SIMBA3\Api\Persistence\Repository\Value;


use Doctrine\ORM\EntityRepository;
use SIMBA3\Component\Domain\Value\Repository\AreaYearValueRepository;

class DoctrineAreaYearValueRepository extends EntityRepository implements AreaYearValueRepository
{

    public function getValues(array $filter): array
    {
        $dql = 'SELECT v FROM SIMBA3\Component\Domain\Value\Entity\AreaYearValue v WHERE v.indicatorId = :indicatorId';
        if (isset($filter["years"]) && count($filter["years"]) > 0) {
            $dql .= " AND (" . implode(" OR ", array_map(function($year) {
                    return "v.year = " . $year["year"];
                }, $filter["years"])) . ")";
        }
        if (isset($filter["areas"]) && count($filter["areas"]) > 0) {
            $dql .= " AND (" . implode(" OR ", array_map(function($area) {
                    return "(v.typeAreaId = " . $area["typeAreaId"] . " AND v.areaId = " . $area["areaId"] . ")";
                }, $filter["areas"])) . ")";
        }
        $query = $this->getEntityManager()->createQuery($dql)->setParameter('indicatorId', $filter["indicatorId"]);
        return $query->getResult();
    }
}