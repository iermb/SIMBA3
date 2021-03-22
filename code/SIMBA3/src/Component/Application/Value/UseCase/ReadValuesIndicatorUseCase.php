<?php


namespace SIMBA3\Component\Application\Value\UseCase;


use InvalidArgumentException;
use SIMBA3\Component\Application\Value\Request\ReadDictionaryVariablesRequest;
use SIMBA3\Component\Application\Value\Request\ReadValuesIndicatorRequest;
use SIMBA3\Component\Application\Value\Response\ReadValuesIndicatorResponse;
use SIMBA3\Component\Domain\Indicator\Repository\IndicatorRepository;
use SIMBA3\Component\Domain\Indicator\Service\MetadataIndicator;
use SIMBA3\Component\Domain\Value\Service\FactoryTypeValue;

class ReadValuesIndicatorUseCase
{
    private IndicatorRepository            $indicatorRepository;
    private FactoryTypeValue               $factoryTypeValue;
    private ReadDictionaryVariablesUseCase $readDictionaryVariablesUseCase;

    public function __construct(
        IndicatorRepository $indicatorRepository,
        FactoryTypeValue $factoryTypeValue,
        ReadDictionaryVariablesUseCase $readDictionaryVariablesUseCase
    ) {
        $this->indicatorRepository = $indicatorRepository;
        $this->factoryTypeValue = $factoryTypeValue;
        $this->readDictionaryVariablesUseCase = $readDictionaryVariablesUseCase;
    }

    public function execute(ReadValuesIndicatorRequest $request): ReadValuesIndicatorResponse
    {
        $indicator = $this->indicatorRepository->getIndicator($request->getIndicatorId());
        if (!$indicator) {
            throw new InvalidArgumentException("Indicator not exists");
        }

        $metadataIndicator = new MetadataIndicator($indicator);

        $typeIndicator = $indicator->getTypeIndicator();

        $typeValue = $this->factoryTypeValue->getObjectTypeValue(
            $typeIndicator->getIdType(),
            $indicator->getId(),
            $request->getFilters()
        );

        $typeValueArray = $typeValue->getTypeValueArray();

        $dictionaries = $this->readDictionaryVariablesUseCase->execute(new ReadDictionaryVariablesRequest(
            $request->getLocale(),
            $typeIndicator->getIdType(),
            $typeValueArray)
        );

        return new ReadValuesIndicatorResponse($metadataIndicator, $dictionaries, $typeValueArray);
    }
}