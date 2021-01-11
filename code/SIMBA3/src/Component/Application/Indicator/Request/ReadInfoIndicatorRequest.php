<?php


namespace SIMBA3\Component\Application\Indicator\Request;


class ReadInfoIndicatorRequest
{
    private int $indicatorId;

    public function __construct(int $indicatorId)
    {
        $this->indicatorId = $indicatorId;
    }

    public function getIndicatorId(): int
    {
        return $this->indicatorId;
    }
}