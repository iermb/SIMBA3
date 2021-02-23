<?php


namespace SIMBA3\Component\Application\Variable\Request;


class ReadAllAreaTypeAreaRequest
{
    private int $typeAreaId;

    public function __construct(int $typeAreaId)
    {
        $this->typeAreaId = $typeAreaId;
    }

    public function getTypeAreaId(): int
    {
        return $this->typeAreaId;
    }
}