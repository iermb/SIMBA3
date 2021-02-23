<?php


namespace SIMBA3\Component\Application\Filter\Service;


use SIMBA3\Component\Domain\Filter\Service\FilterValues;

interface CreateFilterValues
{
    public function getFilter(): FilterValues;
}