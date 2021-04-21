<?php


namespace SIMBA3\Component\Domain\Value\Repository;


interface AreaMonthYearValueRepository
{
    public function getValues(array $filter): array;
}