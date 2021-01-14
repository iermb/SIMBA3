<?php


namespace SIMBA3\Component\Application\Value\Request;


class ReadValuesIndicatorRequest
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