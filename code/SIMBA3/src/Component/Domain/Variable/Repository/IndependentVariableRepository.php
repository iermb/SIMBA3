<?php


namespace SIMBA3\Component\Domain\Variable\Repository;


use SIMBA3\Component\Domain\Variable\Entity\IndependentVariable;

interface IndependentVariableRepository
{
    public function getAllIndependentVariableByTypeIndependentVariable(int $typeIndependentVariableId): array;

    public function getIndependentVariablesByFilter(string $locale, array $independentVariableUniqueCodes): array;
}