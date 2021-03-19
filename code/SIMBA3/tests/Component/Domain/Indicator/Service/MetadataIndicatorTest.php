<?php

namespace SIMBA3\Component\Domain\Indicator\Service;

use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Domain\Indicator\Entity\Indicator;
use SIMBA3\Component\Domain\Indicator\Entity\TypeIndicator;
use SIMBA3\Component\Domain\Indicator\Service\MetadataIndicator;

class MetadataIndicatorTest extends TestCase
{
    private MetadataIndicator $metadataIndicator;
    private Indicator $indicator;
    private TypeIndicator $typeIndicator;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->indicator = $this->createMock(Indicator::class);
        $this->typeIndicator = $this->createMock(TypeIndicator::class);

        $this->typeIndicator->method('getHasArea')->willReturn(false);
        $this->typeIndicator->method('getHasYear')->willReturn(true);
        $this->typeIndicator->method('getHasMonth')->willReturn(false);
        $this->typeIndicator->method('getNumIndependentVars')->willReturn(12);
        $this->typeIndicator->method('getIdType')->willReturn('FAKE_TYPE');

        $this->indicator->method('getTypeIndicator')->willReturn($this->typeIndicator);
        $this->indicator->method('getId')->willReturn(314);
        $this->indicator->method('getName')->willReturn('name of Indicator');
        $this->indicator->method('getDescription')->willReturn('description of Indicator');
        $this->indicator->method('getUnits')->willReturn('units of Indicator');
        $this->indicator->method('getNote')->willReturn('note of Indicator');
        $this->indicator->method('getFont')->willReturn('font of Indicator');
        $this->indicator->method('getMethodology')->willReturn('methodology of Indicator');
    }

    /** @test */
    public function shouldMetadataIndicatorReturnArrayWithValues(): void
    {
        $this->givenMetadataIndicatorWithIndicator();
        $this->shouldReturnArrayWithValues();
    }

    private function givenMetadataIndicatorWithIndicator():void
    {
        $this->metadataIndicator = new MetadataIndicator($this->indicator);
    }

    private function shouldReturnArrayWithValues(): void
    {
        $this->assertEquals(
            [
                'id' => 314,
                'name' => 'name of Indicator',
                'description' => 'description of Indicator',
                'methodology' => 'methodology of Indicator',
                'font' => 'font of Indicator',
                'units' => 'units of Indicator',
                'note' => 'note of Indicator',
                'hasAreaIndicator' => 'false',
                'hasMonthIndicator' => 'false',
                'hasYearIndicator' => 'true',
                'numIndependentVariablesIndicator' => 12,
                'nameTypeIndicator' => 'FAKE_TYPE',
            ],
            $this->metadataIndicator->getValuesAsArray()
        );
    }
}