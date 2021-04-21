<?php


namespace SIMBA3\Api\Persistence\Repository\Value;


use Doctrine\ORM\EntityRepository;
use SIMBA3\Component\Domain\Filter\Service\AreaFilter;
use SIMBA3\Component\Domain\Filter\Service\IndependentVariableFilter;
use SIMBA3\Component\Domain\Value\Repository\AreaIndependentVariable1YearValueRepository;

class DoctrineAreaIndependentVariable1YearValueRepository extends EntityRepository implements AreaIndependentVariable1YearValueRepository
{
    use YearTrait, AreaTrait, IndependentVariableTrait;

    public function getValues(array $filter): array
    {
        $dql = 'SELECT v FROM SIMBA3\Component\Domain\Value\Entity\AreaIndependentVariable1YearValue v WHERE v.indicatorId = :indicatorId';

        $dql .= self::getDQLYear($filter);

        $dql .= self::getDQLArea($filter);

        $dql .= self::getDQLIndependentVariable(1, $filter);

        $query = $this->getEntityManager()->createQuery($dql)->setParameter('indicatorId', $filter["indicatorId"]);
        return $query->getResult();
    }
}