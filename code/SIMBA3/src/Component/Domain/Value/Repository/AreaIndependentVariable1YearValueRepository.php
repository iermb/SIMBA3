<?php


namespace SIMBA3\Component\Domain\Value\Repository;


interface AreaIndependentVariable1YearValueRepository
{
    public function getValues(array $filter): array;
}