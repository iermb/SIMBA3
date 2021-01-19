<?php


namespace SIMBA3\Component\Domain\Value\Service;


interface TypeValue
{
    public function getTypeValueArray(int $typeIndicatorId): TypeValueArray;
}