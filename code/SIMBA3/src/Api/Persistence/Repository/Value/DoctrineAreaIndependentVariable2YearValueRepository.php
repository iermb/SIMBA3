<?php

namespace SIMBA3\Api\Persistence\Repository\Value;

use Doctrine\ORM\EntityRepository;
use SIMBA3\Component\Domain\Filter\Service\AreaFilter;
use SIMBA3\Component\Domain\Filter\Service\IndependentVariableFilter;
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
                    return "(v.typeAreaCode = " . $area[AreaFilter::TYPE_AREA_CODE_FIELD] . " AND v.areaCode = " . $area[AreaFilter::AREA_CODE_FIELD] . ")";
                }, $filter["areas"])) . ")";
        }
        $dql .= self::getDQLIndependentVariable(1, $filter["independentVariable1s"]);
        $dql .= self::getDQLIndependentVariable(2, $filter["independentVariable2s"]);

        $query = $this->getEntityManager()->createQuery($dql)->setParameter('indicatorId', $filter["indicatorId"]);
        return $query->getResult();
    }

    private static function getDQLIndependentVariable(int $independentVariableId, array $independentVariables): string
    {
        if(!isset($independentVariables) || count($independentVariables) < 1) {
            return "";
        }

        return " AND (" . implode(" OR ", array_map(function($independentVariable) use ($independentVariableId) {
            return "(v.typeIndependentVariable".$independentVariableId."Code = " . $independentVariable[IndependentVariableFilter::TYPE_INDEPENDENT_VARIABLE_CODE_FIELD] . " AND v.independentVariable".$independentVariableId."Code = " . $independentVariable[IndependentVariableFilter::INDEPENDENT_VARIABLE_CODE_FIELD] . ")";
        }, $independentVariables)) . ")";
    }
}