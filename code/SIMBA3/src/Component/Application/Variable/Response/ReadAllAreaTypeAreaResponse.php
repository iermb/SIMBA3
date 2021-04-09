<?php


namespace SIMBA3\Component\Application\Variable\Response;


use SIMBA3\Component\Domain\Variable\Entity\TypeArea;

class ReadAllAreaTypeAreaResponse
{
    private const CODE_FIELD = "code";
    private const NAME_FIELD = "name";
    private const TYPE_NAME_FIELD = "type_name";

    private array $areaArray;

    public function __construct(array $areaArray)
    {
        $this->areaArray = $areaArray;
    }

    public function getAllArea(): array
    {

        $allAreaArray = [];

        foreach ($this->areaArray as $area) {
            $allAreaArray[] = [
                self::CODE_FIELD => $area->getCode(),
                self::NAME_FIELD => $area->getName(),
                self::TYPE_NAME_FIELD => $area->getType()->getName()
            ];
        }

        return $allAreaArray;
    }
}