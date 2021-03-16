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

        if (!is_array($this->rawFilter[self::AREA_FILTER])) {
            return new AreasFilter([]);
        }

        $this->rawFilter[self::AREA_FILTER] = array_filter($this->rawFilter[self::AREA_FILTER], function($element){
            if (!is_array($element)) {
                return false;
            }
            if(count($element) != 2) {
                return false;
            }
            if( !is_int($element[0]) || !is_int($element[1])) {
                return false;
            }

            return true;
        });

        return new AreasFilter(array_map(array($this, "createAreaFilter"), $this->rawFilter[self::AREA_FILTER]));
    }

    private function createAreaFilter(array $areaFilter): AreaFilter
    {
        return new AreaFilter($areaFilter[0], $areaFilter[1]);
    }
}