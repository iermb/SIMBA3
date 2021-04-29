<?php

namespace SIMBA3\Component\Domain\Variable\Entity;

class Month
{
    private int    $id;
    private string $name;

    public function __construct(int $id, string $month)
    {
        $this->id = $id;
        $this->name = $month;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }
}