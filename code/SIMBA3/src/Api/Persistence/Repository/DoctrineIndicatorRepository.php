<?php


namespace SIMBA3\Api\Persistence\Repository;


use Doctrine\ORM\EntityRepository;
use SIMBA3\Component\Domain\Indicator\Entity\Indicator;
use SIMBA3\Component\Domain\Indicator\Repository\IndicatorRepository;

class DoctrineIndicatorRepository extends EntityRepository implements IndicatorRepository
{
    private const ID_FIELD = "id";

    public function getIndicator(int $idIndicator): Indicator
    {
        return $this->findOneBy(self::ID_FIELD, $idIndicator);
    }
}