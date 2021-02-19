<?php


namespace SIMBA3\Component\Domain\Filter\Service;


class IndicatorFilter implements FilterValues
{
    private const INDICATOR_ID_FIELD = "indicatorId";

    private int $indicatorId;

    public function __construct(int $indicatorId)
    {
        $this->indicatorId = $indicatorId;
    }


    public function getFilterAsArray(): array
    {
        return [
            self::INDICATOR_ID_FIELD => $this->indicatorId
        ];
    }
}