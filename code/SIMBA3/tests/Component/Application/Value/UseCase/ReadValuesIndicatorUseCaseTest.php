<?php

namespace Component\Application\Value\UseCase;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Application\Value\Request\ReadValuesIndicatorRequest;
use SIMBA3\Component\Application\Value\Response\ReadValuesIndicatorResponse;
use SIMBA3\Component\Application\Value\UseCase\ReadDictionaryVariablesUseCase;
use SIMBA3\Component\Application\Value\UseCase\ReadValuesIndicatorUseCase;
use SIMBA3\Component\Domain\Indicator\Entity\Indicator;
use SIMBA3\Component\Domain\Indicator\Entity\TypeIndicator;
use SIMBA3\Component\Domain\Indicator\Repository\IndicatorRepository;
use SIMBA3\Component\Domain\Value\Service\FactoryTypeValue;
use SIMBA3\Component\Domain\Value\Service\TypeValue;
use SIMBA3\Component\Domain\Value\Service\TypeValueArray;

class ReadValuesIndicatorUseCaseTest extends TestCase
{
    private ReadValuesIndicatorUseCase $readValuesIndicatorUseCase;
    private IndicatorRepository $indicatorRepository;
    private ReadValuesIndicatorRequest $readValuesIndicatorRequest;
    private FactoryTypeValue $factoryTypeValue;
    private Indicator $indicator;
    private TypeIndicator $typeIndicator;
    private TypeValue $typeValue;
    private TypeValueArray $typeValueArray;
    private ReadDictionaryVariablesUseCase $readDictionaryVariablesUseCase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->indicatorRepository = $this->createMock(IndicatorRepository::class);
        $this->readValuesIndicatorRequest = $this->createMock(ReadValuesIndicatorRequest::class);
        $this->factoryTypeValue = $this->createMock(FactoryTypeValue::class);
        $this->indicator = $this->createMock(Indicator::class);
        $this->typeIndicator = $this->createMock(TypeIndicator::class);
        $this->typeValue = $this->createMock(TypeValue::class);
        $this->typeValueArray = $this->createMock(TypeValueArray::class);
        $this->readDictionaryVariablesUseCase = $this->createMock(ReadDictionaryVariablesUseCase::class);
    }

    /** @test */
    public function shouldReadValuesIndicatorUseCaseExpectsErrorWhenNotExistsTheIndicator(): void
    {
        $this->givenAReadValuesIndicatorUseCase();
        $this->whenIndicatorNotExists();
        $this->thenExpectsInvalidArgumentException();
        $this->whenExecuteReadValuesIndicatorUseCase();
    }

    /** @test */
    public function shouldReadValuesIndicatorUseCaseReturnReadValuesIndicatorResponseWhenIndicatorExists(): void
    {
        $this->givenAReadValuesIndicatorUseCase();
        $this->whenIndicatorExists();
        $this->whenFactoryTypeValueReturnATypeValue();
        $this->whenExecuteReadValuesIndicatorUseCaseThenReturnReadValuesIndicatorResponse();
    }

    private function givenAReadValuesIndicatorUseCase(): void
    {
        $this->readValuesIndicatorUseCase = new ReadValuesIndicatorUseCase(
            $this->indicatorRepository,
            $this->factoryTypeValue,
            $this->readDictionaryVariablesUseCase
        );
    }

    private function whenIndicatorNotExists(): void
    {
        $this->indicatorRepository->method("getIndicator")->willReturn(null);
    }

    private function whenIndicatorExists(): void
    {
        $this->indicatorRepository->method("getIndicator")->willReturn($this->indicator);
        $this->indicator->method("getTypeIndicator")->willReturn($this->typeIndicator);
        $this->typeIndicator->method("getIdType")->willReturn("Test");
    }

    private function whenFactoryTypeValueReturnATypeValue(): void
    {
        $this->factoryTypeValue->method("getObjectTypeValue")->willReturn($this->typeValue);
        $this->typeValue->method("getTypeValueArray")->willReturn($this->typeValueArray);
    }


    private function thenExpectsInvalidArgumentException(): void
    {
        $this->expectException(InvalidArgumentException::class);
    }

    private function whenExecuteReadValuesIndicatorUseCase(): void
    {
        $this->readValuesIndicatorUseCase->execute($this->readValuesIndicatorRequest);
    }

    private function whenExecuteReadValuesIndicatorUseCaseThenReturnReadValuesIndicatorResponse(): void
    {
        $this->assertInstanceOf(
            ReadValuesIndicatorResponse::class,
            $this->readValuesIndicatorUseCase->execute($this->readValuesIndicatorRequest)
        );
    }
}
