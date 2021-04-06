<?php


namespace SIMBA3\Component\Application\Indicator\Request;


class ReadInfoIndicatorRequest
{
    private string $locale;
    private int $indicatorId;

    public function __construct(string $locale, int $indicatorId)
    {
        $this->locale = $locale;
        $this->indicatorId = $indicatorId;
    }

    public function getLocale(): string
    {
        return $this->locale;
    }

    public function getIndicatorId(): int
    {
        return $this->indicatorId;
    }
}