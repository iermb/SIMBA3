<?php


namespace SIMBA3\Api\Persistence\Repository\Variable;


use Doctrine\ORM\EntityRepository;
use SIMBA3\Component\Domain\Variable\Entity\IndependentVariable;
use SIMBA3\Component\Domain\Variable\Repository\IndependentVariableRepository;

class DoctrineIndependentVariableRepository extends EntityRepository implements IndependentVariableRepository
{
    private const ID_FIELD = "id";
    private const TYPE_INDEPENDENT_VARIABLE_FIELD = "typeIndependentVariable";

    public function getIndependentVariable(int $independentVariableId): ?IndependentVariable
    {
        return $this->findOneBy([self::ID_FIELD => $independentVariableId]);
    }

    public function getAllIndependentVariableByTypeIndependentVariable(int $typeIndependentVariableId): array
    {
        return $this->findBy([self::TYPE_INDEPENDENT_VARIABLE_FIELD => $typeIndependentVariableId]);
    }

    public function getIndependentVariablesByFilter(array $independentVariableUniqueIds): array
    {
        $dql = 'SELECT i FROM SIMBA3\Component\Domain\Variable\Entity\IndependentVariable i ';
        $dql .= ' WHERE ' . implode(' OR ', array_map(function($independentVariable) {
                return '(i.typeIndependentVariable = ' . $independentVariable['typeIndependentVariableId'] . " AND i.id = " . $independentVariable["independentVariableId"] . ")";
            }, $independentVariableUniqueIds));
        $query = $this->getEntityManager()->createQuery($dql);
        return $query->getResult();
    }
}