<?php


namespace SIMBA3\Component\Application\Indicator\UseCase;


use InvalidArgumentException;
use SIMBA3\Component\Application\Indicator\Request\ReadInfoIndicatorRequest;
use SIMBA3\Component\Application\Indicator\Response\ReadInfoIndicatorResponse;
use SIMBA3\Component\Domain\Indicator\Repository\IndicatorTranslationRepository;

class ReadInfoIndicatorUseCase
{
    private IndicatorTranslationRepository $indicatorTranslationRepository;

    public function __construct(IndicatorTranslationRepository $indicatorTranslationRepository)
    {
        $this->indicatorTranslationRepository = $indicatorTranslationRepository;
    }

    public function execute(ReadInfoIndicatorRequest $request): ReadInfoIndicatorResponse
    {
        $indicatorTranslate = $this->indicatorTranslationRepository->getIndicatorTranslation($request->getLocale(),
            $request->getIndicatorId());

        if (!$indicatorTranslate) {
            throw new InvalidArgumentException("Indicator not exists");
        }
        return new ReadInfoIndicatorResponse($indicatorTranslate);
    }
}