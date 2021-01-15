<?php


namespace SIMBA3\Api\Persistence\Repository\Value;


use Doctrine\ORM\EntityRepository;
use SIMBA3\Component\Domain\Value\Repository\AreaYearValueRepository;

class DoctrineAreaYearValueRepository extends EntityRepository implements AreaYearValueRepository
{

    public function getValues(array $filter): array
    {
        return $this->findBy($filter);
    }
}