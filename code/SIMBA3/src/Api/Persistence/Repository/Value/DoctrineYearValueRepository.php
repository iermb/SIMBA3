<?php


namespace SIMBA3\Api\Persistence\Repository\Value;


use Doctrine\ORM\EntityRepository;
use SIMBA3\Component\Domain\Value\Repository\YearValueRepository;

class DoctrineYearValueRepository extends EntityRepository implements YearValueRepository
{

    public function getValues(array $filter): array
    {
        return $this->findBy($filter);
    }
}