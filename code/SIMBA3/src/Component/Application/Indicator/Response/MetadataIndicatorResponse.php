<?php

namespace SIMBA3\Component\Application\Indicator\Response;

use SIMBA3\Component\Domain\Indicator\Entity\IndicatorTranslation;

class MetadataIndicatorResponse
{
    private const ID_FIELD = 'id';
    private const LANGUAGE_FIELD = 'language';
    private const NAME_FIELD = 'name';
    private const DESCRIPTION_FIELD = 'description';
    private const METHODOLOGY_FIELD = 'methodology';
    private const FONT_FIELD = 'font';
    private const UNITS_FIELD = 'units';
    private const DECIMALS_FIELD = 'decimals';
    private const NOTE_FIELD = 'note';
    private const AREA_INDICATOR_FIELD = 'Area';
    private const MONTH_INDICATOR_FIELD = 'Month';
    private const TERM_INDICATOR_FIELD = 'Term';
    private const YEAR_INDICATOR_FIELD = 'Year';
    private const INDEPENDENT_VARIABLES_INDICATOR_FIELD = 'Independent Variables';
    private const VARIABLES_FIELD = 'variables';


    private IndicatorTranslation $indicatorTranslation;

    public function __construct(IndicatorTranslation $indicatorTranslation)
    {
        $this->indicatorTranslation = $indicatorTranslation;
    }

    public function getValuesAsArray(): array
    {
        $indicator = $this->indicatorTranslation->getIndicator();
        $indicatorType = $indicator->getTypeIndicator();

        $variables = [];

        if ($indicatorType->hasArea()) {
            $variables[] = self::AREA_INDICATOR_FIELD;
        }

        if ($indicatorType->hasYear()) {
            $variables[] = self::YEAR_INDICATOR_FIELD;
        }

        if ($indicatorType->hasMonth()) {
            $variables[] = self::MONTH_INDICATOR_FIELD;
        }

        if ($indicatorType->hasTerm()) {
            $variables[] = self::TERM_INDICATOR_FIELD;
        }

        if (0 < $indicatorType->getNumIndependentVars()) {
            $variables[] = [self::INDEPENDENT_VARIABLES_INDICATOR_FIELD => $indicatorType->getNumIndependentVars()];
        }

        return [
            self::ID_FIELD => $indicator->getId(),
            self::LANGUAGE_FIELD => $this->indicatorTranslation->getLanguage(),
            self::NAME_FIELD => $this->indicatorTranslation->getName(),
            self::DESCRIPTION_FIELD => $this->indicatorTranslation->getDescription(),
            self::METHODOLOGY_FIELD => $this->indicatorTranslation->getMethodology(),
            self::FONT_FIELD => $this->indicatorTranslation->getFont(),
            self::UNITS_FIELD => $this->indicatorTranslation->getUnits(),
            self::DECIMALS_FIELD => $indicator->getDecimals(),
            self::NOTE_FIELD => $this->indicatorTranslation->getNote(),
            self::VARIABLES_FIELD => $variables,
        ];
    }
}