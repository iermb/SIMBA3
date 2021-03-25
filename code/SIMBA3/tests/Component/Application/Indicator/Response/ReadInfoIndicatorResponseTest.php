<?php

namespace SIMBA3\Component\Application\Indicator\Response;

use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Domain\Indicator\Entity\Indicator;
use SIMBA3\Component\Domain\Indicator\Entity\IndicatorTranslation;
use SIMBA3\Component\Domain\Indicator\Entity\TypeIndicator;

class ReadInfoIndicatorResponseTest extends TestCase
{
    private ReadInfoIndicatorResponse $readInfoIndicatorResponse;
    private IndicatorTranslation $indicatorTranslation;
    private TypeIndicator $typeIndicator;
    private Indicator $indicator;

    protected function setUp(): void
    {
        parent::setUp();
        $this->indicatorTranslation = $this->createMock(IndicatorTranslation::class);
        $this->typeIndicator = $this->createMock(TypeIndicator::class);
        $this->indicator = $this->createMock(Indicator::class);
    }

    /** @test */
    public function shouldReadInfoIndicatorResponseReturnIndicatorAsArray(): void
    {
        $this->givenAReadInfoIndicatorResponse();
        $this->givenAnIndicator();
        $this->thenReadInfoIndicatorResponseReturnIndicatorAsArray();
    }

    public function givenAReadInfoIndicatorResponse(): void
    {
        $this->readInfoIndicatorResponse = new ReadInfoIndicatorResponse($this->indicatorTranslation);
    }

    public function givenAnIndicator(): void
    {
        $this->typeIndicator->method("getHasArea")->willReturn(true);
        $this->typeIndicator->method("getHasYear")->willReturn(false);
        $this->typeIndicator->method("getHasMonth")->willReturn(false);
        $this->typeIndicator->method("getNumIndependentVars")->willReturn(3);

        $this->indicator->method("getId")->willReturn(1001);
        $this->indicator->method("getTypeIndicator")->willReturn($this->typeIndicator);
        $this->indicator->method("getDecimals")->willReturn(3);

        $this->indicatorTranslation->method("getIndicator")->willReturn($this->indicator);
        $this->indicatorTranslation->method("getLocale")->willReturn("it");
        $this->indicatorTranslation->method("getName")->willReturn("Test name");
        $this->indicatorTranslation->method("getDescription")->willReturn("Test description");
        $this->indicatorTranslation->method("getUnits")->willReturn("Units test");
        $this->indicatorTranslation->method("getNote")->willReturn("Note test");
        $this->indicatorTranslation->method("getFont")->willReturn("Font test");
        $this->indicatorTranslation->method("getMethodology")->willReturn("Methodology test");
    }

    public function thenReadInfoIndicatorResponseReturnIndicatorAsArray(): void
    {
        $this->assertEquals(
            [
                "id" => 1001,
                "locale" => 'it',
                "name" => "Test name",
                "description" => "Test description",
                "units" => "Units test",
                "decimals" => 3,
                "note" => "Note test",
                "font" => "Font test",
                "methodology" => "Methodology test",
                "hasArea" => true,
                "hasYear" => false,
                "hasMonth" => false,
                "numIndependentVars" => 3
            ],
            $this->readInfoIndicatorResponse->getIndicatorAsArray()
        );
    }
}
