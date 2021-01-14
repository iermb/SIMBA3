<?php


namespace SIMBA3\Component\Domain\Value\Entity;


use SIMBA3\Component\Domain\Value\Repository\ValueRepository;

class FactoryTypeValue
{
    static public function getObjectTypeValue(string $objectType, ValueRepository $valueRepository): TypeValue
    {
        switch ($objectType) {
            case "AREA_YEAR_VALUE":
                return new AreaYearTypeValue($valueRepository);
            default:
                throw new \InvalidArgumentException("Not exists the type value");
        }
    }
}