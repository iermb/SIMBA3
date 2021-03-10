<?php


namespace SIMBA3\Component\Domain\Value\Repository;


interface AreaIndependentVariable2YearValueRepository
{
    public function getValues(array $filter): array;
}