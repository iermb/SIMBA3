<?php


namespace SIMBA3\Component\Domain\Value\Service;

use SIMBA3\Component\Domain\Indicator\Entity\TypeIndicator;

interface TypeValue
{
    public function getTypeValueArray(TypeIndicator $typeIndicator): TypeValueArray;
}