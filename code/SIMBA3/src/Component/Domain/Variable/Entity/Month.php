<?php

namespace SIMBA3\Component\Domain\Variable\Entity;

class Month
{
    private int $id;
    private string $month;

    public function __construct(int $id, string $month)
    {
        $this->id = $id;
        $this->month = $month;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getMonth(): string
    {
        return $this->month;
    }
}