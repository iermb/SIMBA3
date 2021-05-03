<?php

namespace Component\Application\VariableIndicator\UseCase;

use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Application\VariableIndicator\Request\ReadAreasIndicatorRequest;
use SIMBA3\Component\Application\VariableIndicator\Response\ReadAreasIndicatorResponse;
use SIMBA3\Component\Application\VariableIndicator\UseCase\ReadAreasIndicatorUseCase;
use SIMBA3\Component\Domain\Variable\Repository\AreaRepository;
use SIMBA3\Component\Domain\VariableIndicator\Repository\AreaIndicatorRepository;

class ReadAreasIndicatorUseCaseTest extends TestCase
{
    private ReadAreasIndicatorUseCase $readAreasIndicatorUseCase;
    private AreaIndicatorRepository   $areaIndicatorRepository;
    private AreaRepository            $areaRepository;
    private ReadAreasIndicatorRequest $readAreasIndicatorRequest;

    /** @test */
    public function shouldReadAreasIndicatorUseCaseReturnReadAreasIndicatorResponse(): void
    {
        $this->givenAReadAreasIndicatorsUseCase();
        $this->thenReturnAReadAreasIndicatorResponse();
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->areaIndicatorRepository = $this->createMock(AreaIndicatorRepository::class);
        $this->areaRepository = $this->createMock(AreaRepository::class);
        $this->readAreasIndicatorRequest = $this->createMock(ReadAreasIndicatorRequest::class);
    }

    private function givenAReadAreasIndicatorsUseCase(): void
    {
        $this->readAreasIndicatorUseCase = new ReadAreasIndicatorUseCase($this->areaIndicatorRepository,
            $this->areaRepository);
    }

    private function thenReturnAReadAreasIndicatorResponse(): void
    {
        $this->assertInstanceOf(ReadAreasIndicatorResponse::class,
            $this->readAreasIndicatorUseCase->execute($this->readAreasIndicatorRequest));
    }

}
