<?php

namespace Component\Application\Value\UseCase;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Application\Value\Request\ReadValuesIndicatorRequest;
use SIMBA3\Component\Application\Value\Response\ReadValuesIndicatorResponse;
use SIMBA3\Component\Application\Value\UseCase\ReadValuesIndicatorUseCase;
use SIMBA3\Component\Domain\Indicator\Entity\Indicator;
use SIMBA3\Component\Domain\Indicator\Entity\IndicatorTranslation;
use SIMBA3\Component\Domain\Indicator\Entity\TypeIndicator;
use SIMBA3\Component\Domain\Indicator\Repository\IndicatorTranslationRepository;
use SIMBA3\Component\Domain\Variable\Service\CreateDictionariesFromValues;
use SIMBA3\Component\Domain\Value\Service\FactoryTypeValue;
use SIMBA3\Component\Domain\Value\Service\TypeValue;
use SIMBA3\Component\Domain\Value\Service\TypeValueArray;

class ReadValuesIndicatorUseCaseTest extends TestCase
{
    private ReadValuesIndicatorUseCase $readValuesIndicatorUseCase;
    private IndicatorTranslationRepository $indicatorTranslationRepository;
    private ReadValuesIndicatorRequest $readValuesIndicatorRequest;
    private FactoryTypeValue $factoryTypeValue;
    private IndicatorTranslation $indicatorTranslation;
    private Indicator $indicator;
    private TypeIndicator $typeIndicator;
    private TypeValue $typeValue;
    private TypeValueArray $typeValueArray;
    private CreateDictionariesFromValues $createDictionariesFromValues;

    protected function setUp(): void
    {
        parent::setUp();
        $this->indicatorTranslationRepository = $this->createMock(IndicatorTranslationRepository::class);
        $this->readValuesIndicatorRequest = $this->createMock(ReadValuesIndicatorRequest::class);
        $this->factoryTypeValue = $this->createMock(FactoryTypeValue::class);
        $this->indicatorTranslation = $this->createMock(IndicatorTranslation::class);
        $this->indicator = $this->createMock(Indicator::class);
        $this->typeIndicator = $this->createMock(TypeIndicator::class);
        $this->typeValue = $this->createMock(TypeValue::class);
        $this->typeValueArray = $this->createMock(TypeValueArray::class);
        $this->createDictionariesFromValues = $this->createMock(CreateDictionariesFromValues::class);
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
            $this->indicatorTranslationRepository,
            $this->factoryTypeValue,
            $this->createDictionariesFromValues
        );
    }

    private function whenIndicatorNotExists(): void
    {
        $this->indicatorTranslationRepository->method("getIndicatorTranslation")->willReturn(null);
    }

    private function whenIndicatorExists(): void
    {
        $this->indicatorTranslationRepository->method("getIndicatorTranslation")->willReturn($this->indicatorTranslation);
        $this->indicatorTranslation->method("getIndicator")->willReturn($this->indicator);
        $this->indicator->method("getTypeIndicator")->willReturn($this->typeIndicator);
        $this->typeIndicator->method("getIdType")->willReturn("Test");

        $this->createDictionariesFromValues->method('getDictionaries')->willReturn([1,2,3,4]);

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
