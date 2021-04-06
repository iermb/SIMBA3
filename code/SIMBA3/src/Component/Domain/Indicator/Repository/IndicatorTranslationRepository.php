<?php


namespace SIMBA3\Component\Domain\Indicator\Repository;


use SIMBA3\Component\Domain\Indicator\Entity\IndicatorTranslation;

interface IndicatorTranslationRepository
{
    public function getIndicatorTranslation(string $locale, int $indicatorId): ?IndicatorTranslation;
}