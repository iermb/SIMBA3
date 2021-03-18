<?php


namespace SIMBA3\Component\Domain\Variable\Repository;


use SIMBA3\Component\Domain\Variable\Entity\TypeIndependentVariable;

interface TypeIndependentVariableRepository
{
    public function getTypeIndependentVariable(int $typeIndependentVariableId): ?TypeIndependentVariable;

    public function getAllTypeIndependentVariable(): array;
}