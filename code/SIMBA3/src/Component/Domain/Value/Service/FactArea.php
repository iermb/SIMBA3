<?php


namespace SIMBA3\Component\Domain\Value\Service;


class FactArea
{

    private int $id;
    private int $typeId;

    /**
     * FactArea constructor.
     * @param int $id
     * @param int $typeId
     */
    public function __construct(int $id, int $typeId)
    {
        $this->id = $id;
        $this->typeId = $typeId;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getTypeId(): int
    {
        return $this->typeId;
    }


}