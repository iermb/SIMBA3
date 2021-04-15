<?php


namespace SIMBA3\Component\Domain\Value\Service;


class FactYear
{

    private int $year;

    public function __construct(int $year)
    {
        $this->year = $year;
    }

    /**
     * @return int
     */
    public function getYear(): int
    {
        return $this->year;
    }


}