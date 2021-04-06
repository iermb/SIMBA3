<?php

namespace SIMBA3\Component\Application\Indicator\UseCase;

use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Application\Indicator\Request\ReadInfoIndicatorRequest;
use SIMBA3\Component\Application\Indicator\Response\ReadInfoIndicatorResponse;
use SIMBA3\Component\Domain\Indicator\Entity\IndicatorTranslation;
use SIMBA3\Component\Domain\Indicator\Repository\IndicatorTranslationRepository;

class ReadInfoIndicatorUseCaseTest extends TestCase
{
    private ReadInfoIndicatorUseCase $readInfoIndicatorUseCase;
    private IndicatorTranslationRepository $indicatorTranslationRepository;
    private ReadInfoIndicatorRequest $readInfoIndicatorRequest;
    private IndicatorTranslation $indicatorTranslation;

    protected function setUp(): void
    {
        parent::setUp();
        $this->indicatorTranslationRepository = $this->createMock(IndicatorTranslationRepository::class);
        $this->readInfoIndicatorRequest = $this->createMock(ReadInfoIndicatorRequest::class);
        $this->indicatorTranslation = $this->createMock(IndicatorTranslation::class);
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
        $this->readInfoIndicatorUseCase = new ReadInfoIndicatorUseCase($this->indicatorTranslationRepository);
    }

    private function whenNotExistsIndicator(): void
    {
        $this->indicatorTranslationRepository->method("getIndicatorTranslation")->willReturn(null);
    }

    private function whenExistsIndicator(): void
    {
        $this->indicatorTranslationRepository->method("getIndicatorTranslation")->willReturn($this->indicatorTranslation);
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
