<?php


namespace SIMBA3\Api\Persistence\Repository\VariableIndicator;


use Doctrine\ORM\EntityRepository;
use SIMBA3\Component\Domain\VariableIndicator\Repository\YearIndicatorRepository;

class DoctrineYearIndicatorRepository extends EntityRepository implements YearIndicatorRepository
{

    public function getYearsIndicatorByIndicator(int $indicatorId): array
    {
        return $this->findBy(['indicator' => $indicatorId]);
    }
}