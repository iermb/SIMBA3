<?php


namespace SIMBA3\Api\Persistence\Repository\Variable;


use Doctrine\ORM\EntityRepository;
use SIMBA3\Component\Domain\Variable\Entity\IndependentVariable;
use SIMBA3\Component\Domain\Variable\Entity\TypeIndependentVariable;
use SIMBA3\Component\Domain\Variable\Repository\IndependentVariableRepository;

class DoctrineIndependentVariableRepository extends EntityRepository implements IndependentVariableRepository
{
    private const CODE_FIELD = "code";
    private const TYPE_INDEPENDENT_VARIABLE_FIELD = "typeIndependentVariable";

    public function getAllIndependentVariableByTypeIndependentVariable(int $typeIndependentVariableId): array
    {
        return $this->findBy([
            self::TYPE_INDEPENDENT_VARIABLE_FIELD => $typeIndependentVariableId,
        ]);
    }

    public function getIndependentVariablesByFilter(string $locale, array $filters): array
    {
        if(!count($filters)) {
            return [];
        }

        $dql = 'SELECT i FROM SIMBA3\Component\Domain\Variable\Entity\IndependentVariable i INNER JOIN i.typeIndependentVariable t';
        $dql .= ' WHERE t.language = :language';

        $dql .= ' AND (' . implode(' OR ', array_map(function($independentVariable) {
            return '(t.code = ' . $independentVariable[TypeIndependentVariable::TYPE_INDEPENDENT_VARIABLE_CODE_FIELD] . " AND i.code = " . $independentVariable[IndependentVariable::INDEPENDENT_VARIABLE_CODE_FIELD] . ")";
        } , $filters)). ')';

        $query = $this->getEntityManager()->createQuery($dql);
        $query->setParameter('language', $locale);

        return $query->getResult();
    }
}