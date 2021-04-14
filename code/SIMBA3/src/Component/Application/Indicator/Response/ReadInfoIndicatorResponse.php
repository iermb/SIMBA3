<?php

namespace SIMBA3\Component\Application\Indicator\Response;

use SIMBA3\Component\Domain\Indicator\Entity\IndicatorTranslation;
use SIMBA3\Component\Domain\Indicator\Service\MetadataIndicator;

class ReadInfoIndicatorResponse
{
    private MetadataIndicator $metadataIndicator;

    public function __construct(IndicatorTranslation $indicatorTranslation)
    {
        $this->metadataIndicator = new MetadataIndicator($indicatorTranslation);
    }

    public function getIndicatorAsArray(): array
    {
        return $this->metadataIndicator->getValuesAsArray();
    }
}