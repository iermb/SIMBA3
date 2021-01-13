<?php


namespace SIMBA3\Component\Application\Indicator\Response;


use SIMBA3\Component\Domain\Indicator\Entity\Indicator;

class ReadInfoIndicatorResponse
{
    private const ID_FIELD = "id";
    private const NAME_FIELD = "name";
    private const DESCRIPTION_FIELD = "description";
    private const UNITS_FIELD = "units";
    private const NOTE_FIELD = "note";
    private const FONT_FIELD = "font";
    private const METHODOLOGY_FIELD = "methodology";
    private const HAS_AREA_INDICATOR_FIELD = "hasArea";
    private const HAS_YEAR_INDICATOR_FIELD = "hasYear";
    private const HAS_MONTH_INDICATOR_FIELD = "hasMonth";
    private const NUM_INDEPENDENT_VARS_FIELD = "numIndependentVars";

    private Indicator $indicator;

    public function __construct(Indicator $indicator)
    {
        $this->indicator = $indicator;
    }

    public function getIndicatorAsArray(): array
    {
        return [
            self::ID_FIELD => $this->indicator->getId(),
            self::NAME_FIELD => $this->indicator->getName(),
            self::DESCRIPTION_FIELD => $this->indicator->getDescription(),
            self::UNITS_FIELD => $this->indicator->getUnits(),
            self::NOTE_FIELD => $this->indicator->getNote(),
            self::FONT_FIELD => $this->indicator->getFont(),
            self::METHODOLOGY_FIELD => $this->indicator->getMethodology(),
            self::HAS_AREA_INDICATOR_FIELD => $this->indicator->getTypeIndicator()->getHasArea(),
            self::HAS_YEAR_INDICATOR_FIELD => $this->indicator->getTypeIndicator()->getHasYear(),
            self::HAS_MONTH_INDICATOR_FIELD => $this->indicator->getTypeIndicator()->getHasMonth(),
            self::NUM_INDEPENDENT_VARS_FIELD => $this->indicator->getTypeIndicator()->getNumIndependentVars()
        ];
    }
}