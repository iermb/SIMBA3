<?php

namespace SIMBA3\Component\Application\Indicator\Response;

use SIMBA3\Component\Domain\Indicator\Entity\IndicatorTranslation;

class ReadInfoIndicatorResponse
{
    private const ID_FIELD = "id";
    private const LOCALE_FIELD = "locale";
    private const NAME_FIELD = "name";
    private const DESCRIPTION_FIELD = "description";
    private const UNITS_FIELD = "units";
    private const DECIMALS_FIELD = "decimals";
    private const NOTE_FIELD = "note";
    private const FONT_FIELD = "font";
    private const METHODOLOGY_FIELD = "methodology";
    private const HAS_AREA_INDICATOR_FIELD = "hasArea";
    private const HAS_YEAR_INDICATOR_FIELD = "hasYear";
    private const HAS_MONTH_INDICATOR_FIELD = "hasMonth";
    private const NUM_INDEPENDENT_VARS_FIELD = "numIndependentVars";

    private IndicatorTranslation $indicatorTranslation;

    public function __construct(IndicatorTranslation $indicatorTranslation)
    {
        $this->indicatorTranslation = $indicatorTranslation;
    }

    public function getIndicatorAsArray(): array
    {

        $indicator = $this->indicatorTranslation->getIndicator();
        $typeIndicator = $indicator->getTypeIndicator();

        return [
            self::ID_FIELD => $indicator->getId(),
            self::LOCALE_FIELD => $this->indicatorTranslation->getLocale(),
            self::NAME_FIELD => $this->indicatorTranslation->getName(),
            self::DESCRIPTION_FIELD => $this->indicatorTranslation->getDescription(),
            self::UNITS_FIELD => $this->indicatorTranslation->getUnits(),
            self::DECIMALS_FIELD => $indicator->getDecimals(),
            self::NOTE_FIELD => $this->indicatorTranslation->getNote(),
            self::FONT_FIELD => $this->indicatorTranslation->getFont(),
            self::METHODOLOGY_FIELD => $this->indicatorTranslation->getMethodology(),
            self::HAS_AREA_INDICATOR_FIELD => $typeIndicator->getHasArea(),
            self::HAS_YEAR_INDICATOR_FIELD => $typeIndicator->getHasYear(),
            self::HAS_MONTH_INDICATOR_FIELD => $typeIndicator->getHasMonth(),
            self::NUM_INDEPENDENT_VARS_FIELD => $typeIndicator->getNumIndependentVars()
        ];
    }
}