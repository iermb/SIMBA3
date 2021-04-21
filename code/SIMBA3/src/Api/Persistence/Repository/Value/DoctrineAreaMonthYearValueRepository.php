<?php

namespace SIMBA3\Api\Persistence\Repository\Value;

use Doctrine\ORM\EntityRepository;
use SIMBA3\Component\Domain\Value\Repository\AreaMonthYearValueRepository;

class DoctrineAreaMonthYearValueRepository extends EntityRepository implements AreaMonthYearValueRepository
{
    use YearTrait, AreaTrait, MonthTrait;

    public function getValues(array $filter): array
    {
        $dql = 'SELECT v FROM SIMBA3\Component\Domain\Value\Entity\AreaMonthYearValue v WHERE v.indicatorId = :indicatorId';

        $dql .= self::getDQLYear($filter);

        $dql .= self::getDQLArea($filter);

        $dql .= self::getDQLMonth($filter);

        $query = $this->getEntityManager()->createQuery($dql)->setParameter('indicatorId', $filter["indicatorId"]);
        return $query->getResult();
    }
}