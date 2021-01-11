<?php

namespace SIMBA3\Component\Application\Indicator\UseCase;

use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Application\Indicator\Request\ReadInfoIndicatorRequest;
use SIMBA3\Component\Application\Indicator\Response\ReadInfoIndicatorResponse;
use SIMBA3\Component\Domain\Indicator\Entity\Indicator;
use SIMBA3\Component\Domain\Indicator\Repository\IndicatorRepository;

class ReadInfoIndicatorUseCaseTest extends TestCase
{
    private ReadInfoIndicatorUseCase $readInfoIndicatorUseCase;
    private IndicatorRepository $indicatorRepository;
    private ReadInfoIndicatorRequest $readInfoIndicatorRequest;
    private Indicator $indicator;

    protected function setUp(): void
    {
        parent::setUp();
        $this->indicatorRepository = $this->createMock(IndicatorRepository::class);
        $this->readInfoIndicatorRequest = $this->createMock(ReadInfoIndicatorRequest::class);
        $this->indicator = $this->createMock(Indicator::class);
    }

    /** @test */
    public function shouldReadInfoIndicatorUseCaseReturnExceptionWhenNotExists(): void
    {
        $this->givenAnReadInfoIndicatorUseCase();
        $this->whenNotExistsIndicator();
        $this->whenIndicatorExecuteReadInfoIndicatorUseCaseThenReturnException();
    }

    /** @test */
    public function shouldReadInfoIndicatorUseCaseReturnReadInfoIndicatorResponseWhenExists(): void
    {
        $this->givenAnReadInfoIndicatorUseCase();
        $this->whenExistsIndicator();
        $this->whenExecuteReadInfoIndicatorUseCaseThenReturnResponse();
    }

    private function givenAnReadInfoIndicatorUseCase(): void
    {
        $this->readInfoIndicatorUseCase = new ReadInfoIndicatorUseCase($this->indicatorRepository);
    }

    private function whenNotExistsIndicator(): void
    {
        $this->indicatorRepository->method("getIndicator")->willReturn(null);
    }

    private function whenExistsIndicator(): void
    {
        $this->indicatorRepository->method("getIndicator")->willReturn($this->indicator);
    }

    private function whenIndicatorExecuteReadInfoIndicatorUseCaseThenReturnException(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->readInfoIndicatorUseCase->execute($this->readInfoIndicatorRequest);
    }

    private function whenExecuteReadInfoIndicatorUseCaseThenReturnResponse(): void
    {
        $this->assertInstanceOf(
            ReadInfoIndicatorResponse::class,
            $this->readInfoIndicatorUseCase->execute($this->readInfoIndicatorRequest)
        );
    }
}
