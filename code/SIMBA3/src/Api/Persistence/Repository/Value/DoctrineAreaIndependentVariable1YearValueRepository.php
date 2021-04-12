<?php


namespace SIMBA3\Api\Persistence\Repository\Value;


use Doctrine\ORM\EntityRepository;
use SIMBA3\Component\Domain\Filter\Service\AreaFilter;
use SIMBA3\Component\Domain\Filter\Service\IndependentVariableFilter;
use SIMBA3\Component\Domain\Value\Repository\AreaIndependentVariable1YearValueRepository;

class DoctrineAreaIndependentVariable1YearValueRepository extends EntityRepository implements AreaIndependentVariable1YearValueRepository
{

    public function getValues(array $filter): array
    {
        $dql = 'SELECT v FROM SIMBA3\Component\Domain\Value\Entity\AreaIndependentVariable1YearValue v WHERE v.indicatorId = :indicatorId';
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
        if (isset($filter["independentVariable1s"]) && count($filter["independentVariable1s"]) > 0) {
            $dql .= " AND (" . implode(" OR ", array_map(function($independentVariable) {
                    return "(v.typeIndependentVariableCode = " . $independentVariable[IndependentVariableFilter::TYPE_INDEPENDENT_VARIABLE_CODE_FIELD] . " AND v.independentVariableCode = " . $independentVariable[IndependentVariableFilter::INDEPENDENT_VARIABLE_CODE_FIELD] . ")";
                }, $filter["independentVariable1s"])) . ")";
        }

        $query = $this->getEntityManager()->createQuery($dql)->setParameter('indicatorId', $filter["indicatorId"]);
        return $query->getResult();
    }
}