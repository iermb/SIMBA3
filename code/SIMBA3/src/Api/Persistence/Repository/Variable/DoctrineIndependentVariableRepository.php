<?php


namespace SIMBA3\Api\Persistence\Repository\Variable;


use Doctrine\ORM\EntityRepository;
use SIMBA3\Component\Domain\Variable\Entity\IndependentVariable;
use SIMBA3\Component\Domain\Variable\Repository\IndependentVariableRepository;

class DoctrineIndependentVariableRepository extends EntityRepository implements IndependentVariableRepository
{
    private const ID_FIELD = "id";
    private const LANGUAGE_FIELD = "language";
    private const TYPE_INDEPENDENT_VARIABLE_FIELD = "typeIndependentVariable";

    public function getIndependentVariable(string $locale, int $independentVariableId): ?IndependentVariable
    {
        return $this->findOneBy([
            self::ID_FIELD => $independentVariableId,
            self::LANGUAGE_FIELD => $locale,
        ]);
    }

    public function getAllIndependentVariableByTypeIndependentVariable(string $locale, int $typeIndependentVariableId): array
    {
        return $this->findBy([
            self::TYPE_INDEPENDENT_VARIABLE_FIELD => $typeIndependentVariableId,
            self::LANGUAGE_FIELD => $locale,
        ]);
    }

    public function getIndependentVariablesByFilter(string $locale, array $independentVariableUniqueIds): array
    {
        $dql = 'SELECT i FROM SIMBA3\Component\Domain\Variable\Entity\IndependentVariable i ';
        $dql .= ' WHERE i.language = :language';
        $dql .= ' AND ' . implode(' OR ', array_map(function($independentVariable) {
                return '(i.typeIndependentVariable = ' . $independentVariable['typeIndependentVariableId'] . " AND i.id = " . $independentVariable["independentVariableId"] . ")";
            }, $independentVariableUniqueIds));
        $query = $this->getEntityManager()->createQuery($dql);
        $query->setParameter('language', $locale);
        return $query->getResult();
    }
}