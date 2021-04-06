<?php


namespace SIMBA3\Component\Domain\Indicator\Entity;


class Indicator
{
    private int $id;
    private int $decimals;
    private TypeIndicator $typeIndicator;

    public function __construct(
        int $decimals,
        TypeIndicator $typeIndicator
    ) {
        $this->decimals = $decimals;
        $this->typeIndicator = $typeIndicator;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getDecimals(): int
    {
        return $this->decimals;
    }

    public function getTypeIndicator(): TypeIndicator
    {
        return $this->typeIndicator;
    }
}