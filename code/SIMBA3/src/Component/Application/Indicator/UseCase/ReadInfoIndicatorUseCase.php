<?php


namespace SIMBA3\Component\Application\Indicator\UseCase;


use SIMBA3\Component\Application\Indicator\Request\ReadInfoIndicatorRequest;
use SIMBA3\Component\Application\Indicator\Response\ReadInfoIndicatorResponse;
use SIMBA3\Component\Domain\Indicator\Repository\IndicatorRepository;

class ReadInfoIndicatorUseCase
{
    private IndicatorRepository $indicatorRepository;

    public function __construct(IndicatorRepository $indicatorRepository)
    {
        $this->indicatorRepository = $indicatorRepository;
    }

    public function execute(ReadInfoIndicatorRequest $request): ReadInfoIndicatorResponse
    {
        $indicator = $this->indicatorRepository->getIndicator($request->getIndicatorId());
        if (!$indicator) {
            throw new \InvalidArgumentException("Indicator not exists");
        }
        return new ReadInfoIndicatorResponse($indicator);
    }
}