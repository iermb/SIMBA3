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
            self::METHODOLOGY_FIELD => $this->indicator->getMethodology()
        ];
    }
}