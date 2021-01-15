<?php


namespace SIMBA3\Component\Application\Value\UseCase;


use SIMBA3\Component\Application\Value\Request\ReadValuesIndicatorRequest;
use SIMBA3\Component\Application\Value\Response\ReadValuesIndicatorResponse;
use SIMBA3\Component\Domain\Indicator\Repository\IndicatorRepository;
use SIMBA3\Component\Domain\Value\Service\FactoryTypeValue;

class ReadValuesIndicatorUseCase
{
    private IndicatorRepository $indicatorRepository;
    private FactoryTypeValue $factoryTypeValue;

    public function __construct(IndicatorRepository $indicatorRepository, FactoryTypeValue $factoryTypeValue)
    {
        $this->indicatorRepository = $indicatorRepository;
        $this->factoryTypeValue = $factoryTypeValue;
    }

    public function execute(ReadValuesIndicatorRequest $request): ReadValuesIndicatorResponse
    {
        $indicator = $this->indicatorRepository->getIndicator($request->getIndicatorId());
        if (!$indicator) {
            throw new \InvalidArgumentException("Indicator not exists");
        }
        $typeValue = $this->factoryTypeValue->getObjectTypeValue($indicator->getTypeIndicator()->getIdType());
        return new ReadValuesIndicatorResponse($typeValue->getTypeValueArray());
    }
}