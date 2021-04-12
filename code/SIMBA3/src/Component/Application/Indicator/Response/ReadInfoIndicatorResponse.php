<?php

namespace SIMBA3\Component\Application\Indicator\Response;

use SIMBA3\Component\Domain\Indicator\Entity\IndicatorTranslation;
use SIMBA3\Component\Domain\Indicator\Service\MetadataIndicator;

class ReadInfoIndicatorResponse
{
    private MetadataIndicator $metatadaIndicator;

    public function __construct(IndicatorTranslation $indicatorTranslation)
    {
        $this->metatadaIndicator = new MetadataIndicator($indicatorTranslation);
    }

    public function getIndicatorAsArray(): array
    {
        return $this->metatadaIndicator->getValuesAsArray();
    }
}