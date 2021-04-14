<?php

namespace SIMBA3\Component\Application\Value\UseCase;

use InvalidArgumentException;
use SIMBA3\Component\Application\Value\Request\ReadDictionaryVariablesRequest;
use SIMBA3\Component\Domain\Value\Service\AreaDictionary;
use SIMBA3\Component\Domain\Value\Service\AreaYearDictionaryTypeValue;
use SIMBA3\Component\Domain\Value\Service\IndependentVariableDictionary;
use SIMBA3\Component\Domain\Value\Service\AreaIndependentVariable1YearTypeValueUniqueIds;
use SIMBA3\Component\Domain\Value\Service\AreaIndependentVariable2YearTypeValueUniqueIds;
use SIMBA3\Component\Domain\Value\Service\AreaYearTypeValueUniqueIds;
use SIMBA3\Component\Domain\Value\Service\FactoryTypeValue;
use SIMBA3\Component\Domain\Value\Service\YearDictionary;
use SIMBA3\Component\Domain\Value\Service\YearTypeValueUniqueIds;
use SIMBA3\Component\Domain\Variable\Repository\AreaRepository;
use SIMBA3\Component\Domain\Variable\Repository\IndependentVariableRepository;
use SIMBA3\Component\Domain\Variable\Repository\YearRepository;

class ReadDictionaryVariablesUseCase
{
    private const CLASS_NAME_DICTIONARY = 'SIMBA3\\Component\\Domain\\Value\\Service\\';

    private AreaRepository $areaRepository;
    private YearRepository $yearRepository;
    private IndependentVariableRepository $independentVariableRepository;

    public function __construct(
        AreaRepository $areaRepository,
        IndependentVariableRepository $independentVariableRepository,
        YearRepository $yearRepository
    ) {
        $this->areaRepository = $areaRepository;
        $this->independentVariableRepository = $independentVariableRepository;
        $this->yearRepository = $yearRepository;
    }

    public function execute(ReadDictionaryVariablesRequest $request): array
    {
        $classNameDictionary = self::CLASS_NAME_DICTIONARY . $request->getType();

        if (!class_exists($classNameDictionary)) {
            throw new InvalidArgumentException(sprintf('There is not Dictionary defined for type: %s', $classNameDictionary));
        }

        $dictionary = new $classNameDictionary(
            $this->areaRepository,
            $this->independentVariableRepository,
            $this->yearRepository
        );
        return $dictionary->getDictionaries($request);
    }

}