<?php


namespace SIMBA3\Component\Application\VariableIndicator\Request;


class ReadAreasIndicatorRequest
{
    private int    $indicatorId;
    private string $locale;

    public function __construct(int $indicatorId, string $language)
    {
        $this->indicatorId = $indicatorId;
        $this->locale = $language;
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