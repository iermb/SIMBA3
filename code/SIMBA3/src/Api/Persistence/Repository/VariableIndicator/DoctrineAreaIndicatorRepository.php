<?php


namespace SIMBA3\Api\Persistence\Repository\VariableIndicator;


use Doctrine\ORM\EntityRepository;
use SIMBA3\Component\Domain\VariableIndicator\Repository\AreaIndicatorRepository;

class DoctrineAreaIndicatorRepository extends EntityRepository implements AreaIndicatorRepository
{

    public function getAreasIndicatorByIndicator(int $indicatorId): array
    {
        return $this->findBy(['indicator' => $indicatorId]);
    }
}