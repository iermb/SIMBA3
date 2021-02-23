<?php


namespace SIMBA3\Component\Domain\Filter\Service;


class AreasFilter implements FilterValues
{
    private const AREAS_FIELD = "areas";
    private array $areasFilter;

    public function __construct(array $areasFilter)
    {
        $this->areasFilter = $areasFilter;
    }

    public function getFilterAsArray(): array
    {
        return [self::AREAS_FIELD => array_map(function (AreaFilter $areaFilter) {
            return $areaFilter->getFilterAsArray();
        }, $this->areasFilter)];
    }
}