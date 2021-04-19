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
        $this->typeIndicator->method("hasArea")->willReturn(true);
        $this->typeIndicator->method("hasYear")->willReturn(false);
        $this->typeIndicator->method("hasMonth")->willReturn(false);
        $this->typeIndicator->method("getNumIndependentVars")->willReturn(3);

        $this->indicator->method("getId")->willReturn(1001);
        $this->indicator->method("getTypeIndicator")->willReturn($this->typeIndicator);
        $this->indicator->method("getDecimals")->willReturn(3);

        $this->indicatorTranslation->method("getIndicator")->willReturn($this->indicator);
        $this->indicatorTranslation->method("getLanguage")->willReturn("it");
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
                "language" => 'it',
                "name" => "Test name",
                "description" => "Test description",
                "methodology" => "Methodology test",
                "font" => "Font test",
                "units" => "Units test",
                "decimals" => 3,
                "note" => "Note test",
                "variables" => [
                    'Area',
                    ['Independent Variables' => 3],
                ],
            ],
            $this->readInfoIndicatorResponse->getIndicatorAsArray()
        );
    }
}
