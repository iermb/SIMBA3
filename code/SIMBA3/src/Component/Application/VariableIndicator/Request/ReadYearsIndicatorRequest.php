<?php


namespace SIMBA3\Component\Application\VariableIndicator\Request;


class ReadYearsIndicatorRequest
{
    private int $indicatorId;
    private string $locale;

    public function __construct(int $indicatorId, string $locale)
    {
        $this->indicatorId = $indicatorId;
        $this->locale = $locale;
    }

    public function getIndicatorId(): int
    {
        return $this->indicatorId;
    }

    public function getLocale(): string
    {
        return $this->locale;
    }

}