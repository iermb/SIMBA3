<?php

namespace SIMBA3\Api\Persistence\Repository\Value;

use Doctrine\ORM\EntityRepository;
use SIMBA3\Component\Domain\Value\Repository\AreaIndependentVariable2YearValueRepository;

class DoctrineAreaIndependentVariable2YearValueRepository extends EntityRepository implements AreaIndependentVariable2YearValueRepository
{

    public function getValues(array $filter): array
    {
        $dql = 'SELECT v FROM SIMBA3\Component\Domain\Value\Entity\AreaIndependentVariable2YearValue v WHERE v.indicatorId = :indicatorId';
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
        $dql .= self::getDQLIndependentVariable(1, $filter["independentVariables1"]);
        $dql .= self::getDQLIndependentVariable(1, $filter["independentVariables2"]);

        $query = $this->getEntityManager()->createQuery($dql)->setParameter('indicatorId', $filter["indicatorId"]);
        return $query->getResult();
    }

    private static function getDQLIndependentVariable(int $independentVariableId, array $independentVariables): string
    {
        if(!isset($independentVariables) || count($independentVariables) < 1) {
            return "";
        }

        return " AND (" . implode(" OR ", array_map(function($independentVariable) use ($independentVariableId) {
            return "(v.typeIndependentVariable".$independentVariableId."Id = " . $independentVariable["typeIndependentVariableId"] . " AND v.independentVariable".$independentVariableId."Id = " . $independentVariable["independentVariableId"] . ")";
        }, $independentVariables)) . ")";
    }
}