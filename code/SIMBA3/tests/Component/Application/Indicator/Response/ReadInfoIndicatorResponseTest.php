<?php

namespace SIMBA3\Component\Application\Indicator\Response;

use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Domain\Indicator\Entity\Indicator;

class ReadInfoIndicatorResponseTest extends TestCase
{
    private ReadInfoIndicatorResponse $readInfoIndicatorResponse;
    private Indicator $indicator;

    protected function setUp(): void
    {
        parent::setUp();
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
                "methodology" => "Methodology test"
            ],
            $this->readInfoIndicatorResponse->getIndicatorAsArray()
        );
    }
}
