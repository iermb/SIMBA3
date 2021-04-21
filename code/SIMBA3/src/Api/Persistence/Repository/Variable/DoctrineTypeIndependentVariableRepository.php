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
    private const CODE_FIELD = "code";
    private const LANGUAGE_FIELD = "language";

    public function getTypeIndependentVariable(string $locale, int $typeIndependentVariableCode): ?TypeIndependentVariable
    {
        return $this->findOneBy([
            self::LANGUAGE_FIELD => $locale,
            self::CODE_FIELD => $typeIndependentVariableCode,
        ]);
    }

    public function getAllTypeIndependentVariable(string $locale): array
    {
        return $this->findBy([
            self::LANGUAGE_FIELD => $locale,
        ]);
    }
}