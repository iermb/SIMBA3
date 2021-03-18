<?php


namespace SIMBA3\Component\Domain\Value\Service;


interface TypeValueArray
{
    public function getValuesAsArray(): array;

    public function getValues(): array;
}