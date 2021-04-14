<?php


namespace SIMBA3\Api\Persistence\Repository\Value;


use Doctrine\ORM\EntityRepository;
use SIMBA3\Component\Domain\Value\Repository\YearValueRepository;

class DoctrineYearValueRepository extends EntityRepository implements YearValueRepository
{
    use YearTrait;

    public function getValues(array $filter): array
    {
        $dql = 'SELECT v FROM SIMBA3\Component\Domain\Value\Entity\YearValue v WHERE v.indicatorId = :indicatorId';

        $dql .= self::getDQLYear($filter);

        $query = $this->getEntityManager()->createQuery($dql)->setParameter('indicatorId', $filter["indicatorId"]);
        return $query->getResult();
    }
}