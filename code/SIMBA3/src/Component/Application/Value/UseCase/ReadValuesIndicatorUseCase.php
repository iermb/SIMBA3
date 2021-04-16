<?php


namespace SIMBA3\Component\Application\Value\UseCase;


use InvalidArgumentException;
use SIMBA3\Component\Application\Indicator\Response\MetadataIndicatorResponse;
use SIMBA3\Component\Application\Value\Request\ReadValuesIndicatorRequest;
use SIMBA3\Component\Application\Value\Response\ReadValuesIndicatorResponse;
use SIMBA3\Component\Domain\Indicator\Repository\IndicatorTranslationRepository;
use SIMBA3\Component\Domain\Value\Service\FactoryTypeValue;
use SIMBA3\Component\Domain\Variable\Service\CreateDictionariesFromValues;

class ReadValuesIndicatorUseCase
{
    private IndicatorTranslationRepository $indicatorTranslationRepository;
    private FactoryTypeValue               $factoryTypeValue;
    private CreateDictionariesFromValues   $createDictionariesFromValues;

    public function __construct(
        IndicatorTranslationRepository $indicatorTranslationRepository,
        FactoryTypeValue $factoryTypeValue,
        CreateDictionariesFromValues $createDictionariesFromValues
    ) {
        $this->indicatorTranslationRepository = $indicatorTranslationRepository;
        $this->factoryTypeValue = $factoryTypeValue;
        $this->createDictionariesFromValues = $createDictionariesFromValues;
    }

    public function execute(ReadValuesIndicatorRequest $request): ReadValuesIndicatorResponse
    {
        $indicatorTranslation = $this->indicatorTranslationRepository->getIndicatorTranslation($request->getLocale(),
            $request->getIndicatorId());
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

        /*
        $dictionaries = $this->readDictionaryVariablesUseCase->execute(new ReadDictionaryVariablesRequest(
            $request->getLocale(),
            $typeIndicator->getIdType(),
            $typeValueArray)
        );*/

        $dictionaries = $this->createDictionariesFromValues->getDictionaries($typeIndicator, $typeValueArray,
            $request->getLocale());

        return new ReadValuesIndicatorResponse($metadataIndicatorResponse, $dictionaries, $typeValueArray);
    }
}