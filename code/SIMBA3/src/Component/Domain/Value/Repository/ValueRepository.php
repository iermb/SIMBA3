<?php


namespace SIMBA3\Component\Domain\Value\Repository;


interface ValueRepository
{
    public function getValues(array $filter): array;
}