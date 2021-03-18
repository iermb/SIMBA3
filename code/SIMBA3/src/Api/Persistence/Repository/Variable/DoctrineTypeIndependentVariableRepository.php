<?php


namespace SIMBA3\Api\Persistence\Repository\Variable;


use Doctrine\ORM\EntityRepository;
use SIMBA3\Component\Domain\Variable\Entity\Area;
use SIMBA3\Component\Domain\Variable\Entity\IndependentVariable;
use SIMBA3\Component\Domain\Variable\Entity\TypeIndependentVariable;
use SIMBA3\Component\Domain\Variable\Repository\AreaRepository;
use SIMBA3\Component\Domain\Variable\Repository\IndependentVariableRepository;
use SIMBA3\Component\Domain\Variable\Repository\TypeIndependentVariableRepository;

class DoctrineTypeIndependentVariableRepository extends EntityRepository implements TypeIndependentVariableRepository
{
    private const ID_FIELD = "id";

    public function getTypeIndependentVariable(int $typeIndependentVariableId): ?TypeIndependentVariable
    {
        return $this->findOneBy([self::ID_FIELD => $typeIndependentVariableId]);
    }

    public function getAllTypeIndependentVariable(): array
    {
        return $this->findAll();
    }
}