<?php


namespace SIMBA3\Component\Application\Value\Request;


class ReadValuesIndicatorRequest
{
    private int $indicatorId;
    private array $filters;

    public function __construct(int $indicatorId, array $filters)
    {
        $this->indicatorId = $indicatorId;
        $this->filters = $filters;
    }

    public function getIndicatorId(): int
    {
        return $this->indicatorId;
    }

    public function getFilters(): array
    {
        return $this->filters;
    }

}