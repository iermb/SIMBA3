<?php


namespace SIMBA3\Component\Application\Area\Response;


use SIMBA3\Component\Domain\Area\Entity\TypeArea;

class ReadAllTypeAreaResponse
{
    private const ID_FIELD = "id";
    private const NAME_FIELD = "name";

    private array $typeAreaArray;

    public function __construct(array $typeAreaArray)
    {
        $this->typeAreaArray = $typeAreaArray;
    }

    public function getAllTypeArea(): array
    {

        $allTypeAreaArray = [];

        foreach ($this->typeAreaArray as $typeArea) {
            $allTypeAreaArray[] = [
                self::ID_FIELD => $typeArea->getId(),
                self::NAME_FIELD => $typeArea->getName(),
            ];
        }

        return $allTypeAreaArray;
    }
}