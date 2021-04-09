<?php


namespace SIMBA3\Component\Domain\Variable\Repository;


use SIMBA3\Component\Domain\Variable\Entity\TypeIndependentVariable;

interface TypeIndependentVariableRepository
{
    public function getTypeIndependentVariable(string $locale, int $typeIndependentVariableCode): ?TypeIndependentVariable;

    public function getAllTypeIndependentVariable(string $locale): array;
}