<?php


namespace SIMBA3\Component\Domain\Value\Repository;


interface YearValueRepository
{
    public function getValues(array $filter): array;
}