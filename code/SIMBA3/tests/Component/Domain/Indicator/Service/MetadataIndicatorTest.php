<?php

namespace SIMBA3\Component\Domain\Indicator\Service;

use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Domain\Indicator\Entity\Indicator;
use SIMBA3\Component\Domain\Indicator\Entity\IndicatorTranslation;
use SIMBA3\Component\Domain\Indicator\Entity\TypeIndicator;

class MetadataIndicatorTest extends TestCase
{
    private MetadataIndicator $metadataIndicator;
    private IndicatorTranslation $indicatorTranslation;
    private Indicator $indicator;
    private TypeIndicator $typeIndicator;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->indicator = $this->createMock(Indicator::class);
        $this->typeIndicator = $this->createMock(TypeIndicator::class);
        $this->indicatorTranslation = $this->createMock(IndicatorTranslation::class);

        $this->typeIndicator->method('getHasArea')->willReturn(false);
        $this->typeIndicator->method('getHasYear')->willReturn(true);
        $this->typeIndicator->method('getHasMonth')->willReturn(false);
        $this->typeIndicator->method('getNumIndependentVars')->willReturn(12);
        $this->typeIndicator->method('getIdType')->willReturn('FAKE_TYPE');

        $this->indicator->method('getTypeIndicator')->willReturn($this->typeIndicator);
        $this->indicator->method('getId')->willReturn(314);
        $this->indicator->method('getDecimals')->willReturn(2);

        $this->indicatorTranslation->method('getIndicator')->willReturn($this->indicator);
        $this->indicatorTranslation->method('getLanguage')->willReturn('ru');
        $this->indicatorTranslation->method('getName')->willReturn('name of Indicator');
        $this->indicatorTranslation->method('getDescription')->willReturn('description of Indicator');
        $this->indicatorTranslation->method('getUnits')->willReturn('units of Indicator');
        $this->indicatorTranslation->method('getNote')->willReturn('note of Indicator');
        $this->indicatorTranslation->method('getFont')->willReturn('font of Indicator');
        $this->indicatorTranslation->method('getMethodology')->willReturn('methodology of Indicator');
    }

    /** @test */
    public function shouldMetadataIndicatorReturnArrayWithValues(): void
    {
        $this->givenMetadataIndicatorWithIndicatorTranslation();
        $this->shouldReturnArrayWithValues();
    }

    private function givenMetadataIndicatorWithIndicatorTranslation():void
    {
        $this->metadataIndicator = new MetadataIndicator($this->indicatorTranslation);
    }

    private function shouldReturnArrayWithValues(): void
    {
        $this->assertEquals(
            [
                'id' => 314,
                'language' => 'ru',
                'name' => 'name of Indicator',
                'description' => 'description of Indicator',
                'methodology' => 'methodology of Indicator',
                'font' => 'font of Indicator',
                'units' => 'units of Indicator',
                'decimals' => 2,
                'note' => 'note of Indicator',
                'variables' => [
                    'Year',
                    ['Independent Variables' => 12],
                ],
            ],
            $this->metadataIndicator->getValuesAsArray()
        );
    }
}