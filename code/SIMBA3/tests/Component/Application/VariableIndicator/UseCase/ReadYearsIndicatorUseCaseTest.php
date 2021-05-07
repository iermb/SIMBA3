<?php

namespace Component\Application\VariableIndicator\UseCase;

use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Application\VariableIndicator\Request\ReadYearsIndicatorRequest;
use SIMBA3\Component\Application\VariableIndicator\Response\ReadYearsIndicatorResponse;
use SIMBA3\Component\Application\VariableIndicator\UseCase\ReadYearsIndicatorUseCase;
use SIMBA3\Component\Domain\Variable\Repository\YearRepository;
use SIMBA3\Component\Domain\VariableIndicator\Repository\YearIndicatorRepository;

class ReadYearsIndicatorUseCaseTest extends TestCase
{
    private ReadYearsIndicatorUseCase $readYearsIndicatorUseCase;
    private YearRepository            $yearRepository;
    private YearIndicatorRepository   $yearIndicatorRepository;
    private ReadYearsIndicatorRequest $readYearsIndicatorRequest;

    /** @test */
    public function shouldReadYearsIndicatorUseCaseReturnReadYearsIndicatorResponse(): void
    {
        $this->givenAReadYearsIndicatorUseCase();
        $this->thenExpectsGetYearRepositoryAndYearIndicatorRepository();
        $this->thenReturnReadYearsIndicatorResponse();
    }

    private function givenAReadYearsIndicatorUseCase(): void
    {
        $this->readYearsIndicatorUseCase = new ReadYearsIndicatorUseCase($this->yearIndicatorRepository,
            $this->yearRepository);
    }

    private function thenReturnReadYearsIndicatorResponse(): void
    {
        $this->assertInstanceOf(ReadYearsIndicatorResponse::class,
            $this->readYearsIndicatorUseCase->execute($this->readYearsIndicatorRequest));
    }

    private function thenExpectsGetYearRepositoryAndYearIndicatorRepository(): void
    {
        $this->yearRepository->expects($this->once())->method('getYearsByFilter');
        $this->yearIndicatorRepository->expects($this->once())->method('getYearsIndicatorByIndicator');
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->yearRepository = $this->createMock(YearRepository::class);
        $this->yearIndicatorRepository = $this->createMock(YearIndicatorRepository::class);
        $this->readYearsIndicatorRequest = $this->createMock(ReadYearsIndicatorRequest::class);
    }


}
