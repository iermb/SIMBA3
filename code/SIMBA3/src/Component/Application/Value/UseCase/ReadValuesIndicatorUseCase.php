<?php


namespace SIMBA3\Component\Application\Value\UseCase;


use InvalidArgumentException;
use SIMBA3\Component\Application\Value\Request\ReadDictionaryVariablesRequest;
use SIMBA3\Component\Application\Value\Request\ReadValuesIndicatorRequest;
use SIMBA3\Component\Application\Value\Response\ReadValuesIndicatorResponse;
use SIMBA3\Component\Domain\Indicator\Repository\IndicatorTranslationRepository;
use SIMBA3\Component\Application\Indicator\Response\MetadataIndicatorResponse;
use SIMBA3\Component\Domain\Value\Service\FactoryTypeValue;
use SIMBA3\Component\Domain\Variable\Service\CreateDictionariesByTypeIndicator;

class ReadValuesIndicatorUseCase
{
    private IndicatorTranslationRepository  $indicatorTranslationRepository;
    private FactoryTypeValue                $factoryTypeValue;
    private ReadDictionaryVariablesUseCase  $readDictionaryVariablesUseCase;
    private CreateDictionariesByTypeIndicator $createDictionariesByTypeIndicator;

    public function __construct(
        IndicatorTranslationRepository $indicatorTranslationRepository,
        FactoryTypeValue $factoryTypeValue,
        ReadDictionaryVariablesUseCase $readDictionaryVariablesUseCase,
        CreateDictionariesByTypeIndicator $createDictionariesByTypeIndicator
    ) {
        $this->indicatorTranslationRepository = $indicatorTranslationRepository;
        $this->factoryTypeValue = $factoryTypeValue;
        $this->readDictionaryVariablesUseCase = $readDictionaryVariablesUseCase;
        $this->createDictionariesByTypeIndicator = $createDictionariesByTypeIndicator;
    }

    public function execute(ReadValuesIndicatorRequest $request): ReadValuesIndicatorResponse
    {
        $indicatorTranslation = $this->indicatorTranslationRepository->getIndicatorTranslation($request->getLocale(), $request->getIndicatorId());
        if (!$indicatorTranslation) {
            throw new InvalidArgumentException("Indicator not exists");
        }

        $metadataIndicatorResponse = new MetadataIndicatorResponse($indicatorTranslation);

        $indicator = $indicatorTranslation->getIndicator();
        $typeIndicator = $indicator->getTypeIndicator();

        $typeValue = $this->factoryTypeValue->getObjectTypeValue(
            $typeIndicator->getIdType(),
            $indicator->getId(),
            $request->getFilters()
        );

        $typeValueArray = $typeValue->getTypeValueArray();

        $dictionaries = $this->createDictionariesByTypeIndicator->getDictionaries(
            $request->getLocale(),
            $typeIndicator,
            $typeValueArray->getCollectionVariables()
        );

        return new ReadValuesIndicatorResponse($metadataIndicatorResponse, $dictionaries, $typeValueArray);
    }
}