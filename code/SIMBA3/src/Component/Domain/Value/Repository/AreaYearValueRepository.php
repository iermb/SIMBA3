<?php


namespace SIMBA3\Component\Domain\Value\Repository;


interface AreaYearValueRepository
{
    public function getValues(array $filter): array;
}