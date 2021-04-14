<?php


namespace SIMBA3\Api\Persistence\Repository\Value;


use Doctrine\ORM\EntityRepository;
use SIMBA3\Component\Domain\Filter\Service\AreaFilter;
use SIMBA3\Component\Domain\Value\Repository\AreaYearValueRepository;

class DoctrineAreaYearValueRepository extends EntityRepository implements AreaYearValueRepository
{
    use YearTrait, AreaTrait;

    public function getValues(array $filter): array
    {
        $dql = 'SELECT v FROM SIMBA3\Component\Domain\Value\Entity\AreaYearValue v WHERE v.indicatorId = :indicatorId';

        $dql .= self::getDQLYear($filter);

        $dql .= self::getDQLArea($filter);

        $query = $this->getEntityManager()->createQuery($dql)->setParameter('indicatorId', $filter["indicatorId"]);
        return $query->getResult();
    }
}