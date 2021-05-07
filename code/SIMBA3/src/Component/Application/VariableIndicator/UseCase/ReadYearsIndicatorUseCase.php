<?php


namespace SIMBA3\Component\Application\VariableIndicator\UseCase;


use SIMBA3\Component\Application\VariableIndicator\Request\ReadYearsIndicatorRequest;
use SIMBA3\Component\Application\VariableIndicator\Response\ReadYearsIndicatorResponse;
use SIMBA3\Component\Domain\Value\Service\TypeValueArray;
use SIMBA3\Component\Domain\Variable\Repository\YearRepository;
use SIMBA3\Component\Domain\VariableIndicator\Entity\YearIndicator;
use SIMBA3\Component\Domain\VariableIndicator\Repository\YearIndicatorRepository;

class ReadYearsIndicatorUseCase
{
    private YearIndicatorRepository $yearIndicatorRepository;
    private YearRepository          $yearRepository;

    public function __construct(YearIndicatorRepository $yearIndicatorRepository, YearRepository $yearRepository)
    {
        $this->yearIndicatorRepository = $yearIndicatorRepository;
        $this->yearRepository = $yearRepository;
    }

    public function execute(ReadYearsIndicatorRequest $request): ReadYearsIndicatorResponse
    {
        $years = $this->yearRepository->getYearsByFilter(array_map(array($this, 'getYearCode'),
            $this->yearIndicatorRepository->getYearsIndicatorByIndicator($request->getIndicatorId())));

        return new ReadYearsIndicatorResponse($years);
    }

    private function getYearCode(YearIndicator $yearIndicator): array
    {
        return [
            TypeValueArray::CODE_YEAR => $yearIndicator->getYear()
        ];
    }
}