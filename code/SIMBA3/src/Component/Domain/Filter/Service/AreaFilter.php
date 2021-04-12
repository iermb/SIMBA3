<?php


namespace SIMBA3\Component\Domain\Filter\Service;

class AreaFilter implements FilterValues
{
    public const AREA_CODE_FIELD = "areaCode";
    public const TYPE_AREA_CODE_FIELD = "typeAreaCode";

    private int $typeAreaCode;
    private int $areaCode;

    public function __construct(int $typeAreaCode, int $areaCode)
    {
        $this->typeAreaCode = $typeAreaCode;
        $this->areaCode = $areaCode;
    }

    public function getFilterAsArray(): array
    {
        return [
            self::TYPE_AREA_CODE_FIELD => $this->typeAreaCode,
            self::AREA_CODE_FIELD => $this->areaCode
        ];
    }
}