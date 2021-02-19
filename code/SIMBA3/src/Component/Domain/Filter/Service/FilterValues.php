<?php


namespace SIMBA3\Component\Domain\Filter\Service;


interface FilterValues
{
    public const AREAS_FILTER = "areasFilter";
    public const YEARS_FILTER = "yearsFilter";

    public function getFilterAsArray(): array;
}