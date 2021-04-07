<?php

namespace SIMBA3\Component\Domain\Indicator\Service;

use SIMBA3\Component\Domain\Indicator\Entity\IndicatorTranslation;

class MetadataIndicator
{
    private const ID_FIELD = 'id';
    private const LOCALE_FIELD = 'locale';
    private const NAME_FIELD = 'name';
    private const DESCRIPTION_FIELD = 'description';
    private const METHODOLOGY_FIELD = 'methodology';
    private const FONT_FIELD = 'font';
    private const UNITS_FIELD = 'units';
    private const DECIMALS_FIELD = 'decimals';
    private const NOTE_FIELD = 'note';
    private const HAS_AREA_INDICATOR_FIELD = 'hasAreaIndicator';
    private const HAS_MONTH_INDICATOR_FIELD = 'hasMonthIndicator';
    private const HAS_YEAR_INDICATOR_FIELD = 'hasYearIndicator';
    private const NUM_INDEPENDENT_VARIABLES_INDICATOR_FIELD = 'numIndependentVariablesIndicator';
    private const NAME_TYPE_INDICATOR_FIELD = 'nameTypeIndicator';
    private IndicatorTranslation $indicatorTranslation;

    public function __construct(IndicatorTranslation $indicatorTranslation)
    {
        $this->indicatorTranslation = $indicatorTranslation;
    }

    public function getValuesAsArray(): array
    {
        $indicator = $this->indicatorTranslation->getIndicator();
        $indicatorType = $indicator->getTypeIndicator();

        return [
            self::ID_FIELD => $indicator->getId(),
            self::LOCALE_FIELD => $this->indicatorTranslation->getLanguage(),
            self::NAME_FIELD => $this->indicatorTranslation->getName(),
            self::DESCRIPTION_FIELD => $this->indicatorTranslation->getDescription(),
            self::METHODOLOGY_FIELD => $this->indicatorTranslation->getMethodology(),
            self::FONT_FIELD => $this->indicatorTranslation->getFont(),
            self::UNITS_FIELD => $this->indicatorTranslation->getUnits(),
            self::DECIMALS_FIELD => $indicator->getDecimals(),
            self::NOTE_FIELD => $this->indicatorTranslation->getNote(),
            self::HAS_AREA_INDICATOR_FIELD => $indicatorType->getHasArea() ? 'true' : 'false',
            self::HAS_MONTH_INDICATOR_FIELD => $indicatorType->getHasMonth() ? 'true' : 'false',
            self::HAS_YEAR_INDICATOR_FIELD => $indicatorType->getHasYear() ? 'true' : 'false',
            self::NUM_INDEPENDENT_VARIABLES_INDICATOR_FIELD => $indicatorType->getNumIndependentVars(),
            self::NAME_TYPE_INDICATOR_FIELD => $indicatorType->getIdType(),
        ];
    }

}