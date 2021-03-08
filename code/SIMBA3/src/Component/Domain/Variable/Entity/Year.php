<?php


namespace SIMBA3\Component\Domain\Variable\Entity;


class Year
{
    public const YEAR_ID_FIELD = "yearId";

    private int $year;

    public function __construct(int $year) {
        $this->year = $year;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function getId(): int
    {
        return $this->year;
    }
}