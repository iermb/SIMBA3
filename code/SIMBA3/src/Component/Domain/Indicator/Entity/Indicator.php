<?php


namespace SIMBA3\Component\Domain\Indicator\Entity;


class Indicator
{
    private int $id;
    private string $name;
    private string $description;
    private string $units;
    private string $note;
    private string $font;
    private string $methodology;
    private int $decimals;
    private int $typeIndicator;
}