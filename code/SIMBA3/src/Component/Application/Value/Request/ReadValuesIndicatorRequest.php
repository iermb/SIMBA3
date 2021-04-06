<?php


namespace SIMBA3\Component\Application\Value\Request;


class ReadValuesIndicatorRequest
{
    private string $locale;
    private int $indicatorId;
    private array $filters;

    public function __construct(string $locale, int $indicatorId, array $filters)
    {
        $this->locale = $locale;
        $this->indicatorId = $indicatorId;
        $this->filters = $filters;
    }

    public function getLocale(): string
    {
        return $this->locale;
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