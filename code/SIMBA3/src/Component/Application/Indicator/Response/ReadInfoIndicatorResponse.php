<?php

namespace SIMBA3\Component\Application\Indicator\Response;

use SIMBA3\Component\Domain\Indicator\Entity\IndicatorTranslation;
use SIMBA3\Component\Application\Indicator\Response\MetadataIndicatorResponse;

class ReadInfoIndicatorResponse
{
    private MetadataIndicatorResponse $metadataIndicatorResponse;

    public function __construct(IndicatorTranslation $indicatorTranslation)
    {
        $this->metadataIndicatorResponse = new MetadataIndicatorResponse($indicatorTranslation);
    }

    public function getIndicatorAsArray(): array
    {
        return $this->metadataIndicatorResponse->getValuesAsArray();
    }
}