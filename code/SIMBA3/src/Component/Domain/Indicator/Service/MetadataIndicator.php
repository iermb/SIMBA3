<?php

namespace SIMBA3\Component\Domain\Indicator\Service;

use SIMBA3\Component\Domain\Indicator\Entity\Indicator;

class MetadataIndicator
{
    private const ID_FIELD = 'id';
    private const NAME_FIELD = 'name';
    private const DESCRIPTION_FIELD = 'description';
    private const METHODOLOGY_FIELD = 'methodology';
    private const FONT_FIELD = 'font';
    private const UNITS_FIELD = 'units';
    private const NOTE_FIELD = 'note';
    private const HAS_AREA_INDICATOR_FIELD = 'hasAreaIndicator';
    private const HAS_MONTH_INDICATOR_FIELD = 'hasMonthIndicator';
    private const HAS_YEAR_INDICATOR_FIELD = 'hasYearIndicator';
    private const NUM_INDEPENDENT_VARIABLES_INDICATOR_FIELD = 'numIndependentVariablesIndicator';
    private const NAME_TYPE_INDICATOR_FIELD = 'nameTypeIndicator';
    private Indicator $indicator;

    public function __construct(Indicator $indicator)
    {
        $this->indicator = $indicator;
    }

    public function getValuesAsArray(): array
    {
        return [
            self::ID_FIELD => $this->indicator->getId(),
            self::NAME_FIELD => $this->indicator->getName(),
            self::DESCRIPTION_FIELD => $this->indicator->getDescription(),
            self::METHODOLOGY_FIELD => $this->indicator->getMethodology(),
            self::FONT_FIELD => $this->indicator->getFont(),
            self::UNITS_FIELD => $this->indicator->getUnits(),
            self::NOTE_FIELD => $this->indicator->getNote(),
            self::HAS_AREA_INDICATOR_FIELD => $this->indicator->getTypeIndicator()->getHasArea() ? 'true' : 'false',
            self::HAS_MONTH_INDICATOR_FIELD => $this->indicator->getTypeIndicator()->getHasMonth() ? 'true' : 'false',
            self::HAS_YEAR_INDICATOR_FIELD => $this->indicator->getTypeIndicator()->getHasYear() ? 'true' : 'false',
            self::NUM_INDEPENDENT_VARIABLES_INDICATOR_FIELD => $this->indicator->getTypeIndicator()->getNumIndependentVars(),
            self::NAME_TYPE_INDICATOR_FIELD => $this->indicator->getTypeIndicator()->getIdType(),
        ];
    }

}