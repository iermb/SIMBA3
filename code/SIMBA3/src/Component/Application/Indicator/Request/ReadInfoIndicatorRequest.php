<?php


namespace SIMBA3\Component\Application\Indicator\Request;


class ReadInfoIndicatorRequest
{
    private int $idIndicator;

    public function __construct(int $idIndicator)
    {
        $this->idIndicator = $idIndicator;
    }

    public function getIdIndicator(): int
    {
        return $this->idIndicator;
    }
}