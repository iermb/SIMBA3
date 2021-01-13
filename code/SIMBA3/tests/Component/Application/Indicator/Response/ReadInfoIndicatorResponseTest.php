<?php

namespace SIMBA3\Component\Application\Indicator\Response;

use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Domain\Indicator\Entity\Indicator;
use SIMBA3\Component\Domain\Indicator\Entity\TypeIndicator;

class ReadInfoIndicatorResponseTest extends TestCase
{
    private ReadInfoIndicatorResponse $readInfoIndicatorResponse;
    private Indicator $indicator;
    private TypeIndicator $typeIndicator;

    protected function setUp(): void
    {
        parent::setUp();
        $this->indicator = $this->createMock(Indicator::class);
        $this->typeIndicator = $this->createMock(TypeIndicator::class);
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
        $this->readInfoIndicatorResponse = new ReadInfoIndicatorResponse($this->indicator);
    }

    public function givenAnIndicator(): void
    {
        $this->indicator->method("getId")->willReturn(1001);
        $this->indicator->method("getName")->willReturn("Test name");
        $this->indicator->method("getDescription")->willReturn("Test description");
        $this->indicator->method("getUnits")->willReturn("Units test");
        $this->indicator->method("getNote")->willReturn("Note test");
        $this->indicator->method("getFont")->willReturn("Font test");
        $this->indicator->method("getMethodology")->willReturn("Methodology test");
        $this->indicator->method("getTypeIndicator")->willReturn($this->typeIndicator);
        $this->typeIndicator->method("getHasArea")->willReturn(true);
        $this->typeIndicator->method("getHasYear")->willReturn(false);
        $this->typeIndicator->method("getHasMonth")->willReturn(false);
        $this->typeIndicator->method("getNumIndependentVars")->willReturn(3);
        $this->typeIndicator->method("getObjectType")->willReturn("AREA_YEAR_VALUE");
    }

    public function thenReadInfoIndicatorResponseReturnIndicatorAsArray(): void
    {
        $this->assertEquals(
            [
                "id" => 1001,
                "name" => "Test name",
                "description" => "Test description",
                "units" => "Units test",
                "note" => "Note test",
                "font" => "Font test",
                "methodology" => "Methodology test",
                "hasArea" => true,
                "hasYear" => false,
                "hasMonth" => false,
                "numIndependentVars" => 3,
                "objectType" => "AREA_YEAR_VALUE"
            ],
            $this->readInfoIndicatorResponse->getIndicatorAsArray()
        );
    }
}
