<?php


namespace SIMBA3\Component\Application\Value\UseCase;


use SIMBA3\Component\Application\Value\Request\ReadValuesIndicatorRequest;
use SIMBA3\Component\Application\Value\Response\ReadValuesIndicatorResponse;
use SIMBA3\Component\Domain\Indicator\Repository\IndicatorRepository;
use SIMBA3\Component\Domain\Value\Entity\FactoryTypeValue;
use SIMBA3\Component\Domain\Value\Repository\ValueRepository;

class ReadValuesIndicatorUseCase
{
    private IndicatorRepository $indicatorRepository;
    private ValueRepository $valueRepository;

    public function __construct(IndicatorRepository $indicatorRepository, ValueRepository $valueRepository)
    {
        $this->indicatorRepository = $indicatorRepository;
        $this->valueRepository = $valueRepository;
    }

    public function execute(ReadValuesIndicatorRequest $request): ReadValuesIndicatorResponse
    {
        $indicator = $this->indicatorRepository->getIndicator($request->getIndicatorId());
        if (!$indicator) {
            throw new \InvalidArgumentException("Indicator not exists");
        }
        $typeValue = FactoryTypeValue::getObjectTypeValue($indicator->getTypeIndicator(), $this->valueRepository);
        return new ReadValuesIndicatorResponse($typeValue->getTypeValueArray());
    }
}