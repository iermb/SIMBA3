<?php

namespace SIMBA3\Api\Persistence\Repository\Value;

use Doctrine\ORM\EntityRepository;
use SIMBA3\Component\Domain\Filter\Service\AreaFilter;
use SIMBA3\Component\Domain\Filter\Service\IndependentVariableFilter;
use SIMBA3\Component\Domain\Value\Repository\AreaIndependentVariable2YearValueRepository;

class DoctrineAreaIndependentVariable2YearValueRepository extends EntityRepository implements AreaIndependentVariable2YearValueRepository
{
    use YearTrait, AreaTrait, IndependentVariableTrait;

    public function getValues(array $filter): array
    {
        $dql = 'SELECT v FROM SIMBA3\Component\Domain\Value\Entity\AreaIndependentVariable2YearValue v WHERE v.indicatorId = :indicatorId';

        $dql .= self::getDQLYear($filter);

        $dql .= self::getDQLArea($filter);

        $dql .= self::getDQLIndependentVariable(1, $filter);
        $dql .= self::getDQLIndependentVariable(2, $filter);

        $query = $this->getEntityManager()->createQuery($dql)->setParameter('indicatorId', $filter["indicatorId"]);
        return $query->getResult();
    }
}