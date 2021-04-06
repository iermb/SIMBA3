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
    private const LANGUAGE_FIELD = "language";

    public function getTypeIndependentVariable(string $locale, int $typeIndependentVariableId): ?TypeIndependentVariable
    {
        return $this->findOneBy([
            self::LANGUAGE_FIELD => $locale,
            self::ID_FIELD => $typeIndependentVariableId,
        ]);
    }

    public function getAllTypeIndependentVariable(string $locale): array
    {
        return $this->findBy([
            self::LANGUAGE_FIELD => $locale,
        ]);
    }
}