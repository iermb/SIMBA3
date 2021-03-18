<?php


namespace SIMBA3\Component\Domain\Variable\Repository;


use SIMBA3\Component\Domain\Variable\Entity\IndependentVariable;

interface IndependentVariableRepository
{
    public function getIndependentVariable(int $IndependentVariableId): ?IndependentVariable;

    public function getAllIndependentVariableByTypeIndependentVariable(int $typeIndependentVariableId): array;

    public function getIndependentVariablesByFilter(array $independentVariableUniqueIds): array;
}