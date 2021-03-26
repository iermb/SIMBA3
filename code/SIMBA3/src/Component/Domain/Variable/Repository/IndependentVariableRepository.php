<?php


namespace SIMBA3\Component\Domain\Variable\Repository;


use SIMBA3\Component\Domain\Variable\Entity\IndependentVariable;

interface IndependentVariableRepository
{
    public function getIndependentVariable(string $locale, int $independentVariableId): ?IndependentVariable;

    public function getAllIndependentVariableByTypeIndependentVariable(string $locale, int $typeIndependentVariableId): array;

    public function getIndependentVariablesByFilter(string $locale, array $independentVariableUniqueIds): array;
}