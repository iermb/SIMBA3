<?php


namespace SIMBA3\Component\Application\Filter\Service;


use InvalidArgumentException;
use SIMBA3\Component\Domain\Filter\Service\AreaFilter;
use SIMBA3\Component\Domain\Filter\Service\AreasFilter;

class CreateAreasFilter implements CreateFilterValues
{
    private const AREA_FILTER = "areas";
    private array $rawFilter;

    public function __construct(array $rawFilter)
    {
        $this->rawFilter = $rawFilter;
    }

    public function getFilter(): AreasFilter
    {
        if (!isset($this->rawFilter[self::AREA_FILTER])) {
            return new AreasFilter([]);
        }
        return new AreasFilter(array_map(array($this, "createAreaFilter"), $this->rawFilter[self::AREA_FILTER]));
    }

    private function createAreaFilter(array $areaFilter): AreaFilter
    {
        if (count($areaFilter) != 2) {
            throw new InvalidArgumentException("Format Area filter is not correct");
        }
        return new AreaFilter($areaFilter[0], $areaFilter[1]);
    }
}