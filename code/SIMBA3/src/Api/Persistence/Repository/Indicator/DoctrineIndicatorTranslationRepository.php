<?php


namespace SIMBA3\Api\Persistence\Repository\Indicator;


use Doctrine\ORM\EntityRepository;
use SIMBA3\Component\Domain\Indicator\Entity\IndicatorTranslation;
use SIMBA3\Component\Domain\Indicator\Repository\IndicatorTranslationRepository;

class DoctrineIndicatorTranslationRepository extends EntityRepository implements IndicatorTranslationRepository
{
    private const INDICATOR_FIELD = "indicator";
    private const LOCALE_FIELD = "locale";

    public function getIndicatorTranslation(string $locale, int $indicatorId): ?IndicatorTranslation
    {
        return $this->findOneBy([
            self::INDICATOR_FIELD => $indicatorId,
            self::LOCALE_FIELD => $locale,
        ]);
    }
}