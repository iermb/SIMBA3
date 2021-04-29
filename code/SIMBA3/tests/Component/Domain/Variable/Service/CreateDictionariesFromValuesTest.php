<?php

namespace SIMBA3\Component\Domain\Variable\Service;

use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Domain\Indicator\Entity\TypeIndicator;
use SIMBA3\Component\Domain\Value\Service\TypeValueArray;
use SIMBA3\Component\Domain\Variable\Entity\Area;
use SIMBA3\Component\Domain\Variable\Entity\IndependentVariable;
use SIMBA3\Component\Domain\Variable\Entity\Month;
use SIMBA3\Component\Domain\Variable\Entity\TypeArea;
use SIMBA3\Component\Domain\Variable\Entity\TypeIndependentVariable;
use SIMBA3\Component\Domain\Variable\Entity\Year;
use SIMBA3\Component\Domain\Variable\Repository\AreaRepository;
use SIMBA3\Component\Domain\Variable\Repository\IndependentVariableRepository;
use SIMBA3\Component\Domain\Variable\Repository\YearRepository;
use SIMBA3\Component\Domain\Variable\Repository\MonthRepository;

class CreateDictionariesFromValuesTest extends TestCase
{
    private CreateDictionariesFromValues    $createDictionariesFromValues;

    private AreaRepository                  $areaRepository;
    private IndependentVariableRepository   $independentVariableRepository;
    private YearRepository                  $yearRepository;
    private MonthRepository                 $monthRepository;
    private MonthRepository                 $termRepository;

    private TypeIndicator                   $typeIndicator;
    private TypeValueArray                  $typeValueArray;
    private string                          $locale;

    private Area                            $area;
    private TypeArea                        $typeArea;

    private IndependentVariable             $independentVariable;
    private TypeIndependentVariable         $typeIndependentVariable;

    private Year                            $year;
    private Month                           $month;
    private Month                           $term;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->areaRepository = $this->createMock(AreaRepository::class);
        $this->independentVariableRepository = $this->createMock(IndependentVariableRepository::class);
        $this->yearRepository = $this->createMock(YearRepository::class);
        $this->monthRepository = $this->createMock(MonthRepository::class);
        $this->termRepository = $this->createMock(MonthRepository::class);

        $this->typeIndicator = $this->createMock(TypeIndicator::class);
        $this->typeValueArray = $this->createMock(TypeValueArray::class);

        $this->locale = 'ca';

        $this->typeArea = $this->createMock(TypeArea::class);
        $this->typeArea->method('getId')->willReturn(1);
        $this->area = $this->createMock(Area::class);
        $this->area->method('getType')->willReturn($this->typeArea);
        $this->area->method('getCode')->willReturn(2);
        $this->area->method('getName')->willReturn('Area name');

        $this->typeIndependentVariable = $this->createMock(TypeIndependentVariable::class);
        $this->typeIndependentVariable->method('getId')->willReturn(2);
        $this->independentVariable = $this->createMock(IndependentVariable::class);
        $this->independentVariable->method('getType')->willReturn($this->typeIndependentVariable);
        $this->independentVariable->method('getCode')->willReturn(2);
        $this->independentVariable->method('getName')->willReturn('IndependentVariable name');

        $this->year = $this->createMock(Year::class);
        $this->year->method('getId')->willReturn(3);
        $this->year->method('getYear')->willReturn(2020);

        $this->month = $this->createMock(Month::class);
        $this->month->method('getId')->willReturn(7);
        $this->month->method('getName')->willReturn('Juliol');

        $this->term = $this->createMock(Month::class);
        $this->term->method('getId')->willReturn(1);
        $this->term->method('getName')->willReturn('1r trimestre');
    }

    /** @test */
    public function shouldEmptyTypeIndicatorInCreateDictionariesFromValuesReturnEmptyArray()
    {
        $this->givenEmptyTypeIndicatorInCreateDictionaries();
        $this->thenReturnEmptyArray();
    }

    private function givenEmptyTypeIndicatorInCreateDictionaries()
    {
        $this->typeIndicator->method('hasArea')->willReturn(false);
        $this->typeIndicator->method('getNumIndependentVars')->willReturn(0);
        $this->typeIndicator->method('hasYear')->willReturn(false);
        $this->typeIndicator->method('hasMonth')->willReturn(false);
        $this->typeIndicator->method('hasTerm')->willReturn(false);

        $this->createDictionariesFromValues = new CreateDictionariesFromValues(
            $this->areaRepository,
            $this->independentVariableRepository,
            $this->yearRepository,
            $this->monthRepository,
            $this->termRepository,
        );
    }

    private function thenReturnEmptyArray()
    {
        $this->assertEquals(
            [],
            $this->createDictionariesFromValues->getDictionaries(
                $this->typeIndicator,
                $this->typeValueArray,
                $this->locale
            )
        );
    }

    /** @test */
    public function shouldHasAreaTypeIndicatorInCreateDictionariesFromValuesReturnAreaArray()
    {
        $this->givenHasAreaTypeIndicatorInCreateDictionaries();
        $this->thenReturnAreaArray();
    }

    private function givenHasAreaTypeIndicatorInCreateDictionaries()
    {
        $this->typeIndicator->method('hasArea')->willReturn(true);
        $this->typeIndicator->method('getNumIndependentVars')->willReturn(0);
        $this->typeIndicator->method('hasYear')->willReturn(false);
        $this->typeIndicator->method('hasMonth')->willReturn(false);
        $this->typeIndicator->method('hasTerm')->willReturn(false);

        $this->typeValueArray->method('getAreas')->willReturn([]);
        $this->areaRepository->method('getAreasByFilter')->willReturn([$this->area]);

        $this->createDictionariesFromValues = new CreateDictionariesFromValues(
            $this->areaRepository,
            $this->independentVariableRepository,
            $this->yearRepository,
            $this->monthRepository,
            $this->termRepository
        );
    }

    private function thenReturnAreaArray()
    {
        $this->assertEquals(
            [new AreaDictionary([$this->area])],
            $this->createDictionariesFromValues->getDictionaries(
                $this->typeIndicator,
                $this->typeValueArray,
                $this->locale
            )
        );
    }

    /** @test */
    public function shouldHasYearTypeIndicatorInCreateDictionariesFromValuesReturnYearArray()
    {
        $this->givenHasYearTypeIndicatorInCreateDictionaries();
        $this->thenReturnYearArray();
    }

    private function givenHasYearTypeIndicatorInCreateDictionaries()
    {
        $this->typeIndicator->method('hasArea')->willReturn(false);
        $this->typeIndicator->method('getNumIndependentVars')->willReturn(0);
        $this->typeIndicator->method('hasYear')->willReturn(true);
        $this->typeIndicator->method('hasMonth')->willReturn(false);
        $this->typeIndicator->method('hasTerm')->willReturn(false);

        $this->typeValueArray->method('getYears')->willReturn([]);
        $this->yearRepository->method('getYearsByFilter')->willReturn([$this->year]);

        $this->createDictionariesFromValues = new CreateDictionariesFromValues(
            $this->areaRepository,
            $this->independentVariableRepository,
            $this->yearRepository,
            $this->monthRepository,
            $this->termRepository
        );
    }

    private function thenReturnYearArray()
    {
        $this->assertEquals(
            [new YearDictionary([$this->year])],
            $this->createDictionariesFromValues->getDictionaries(
                $this->typeIndicator,
                $this->typeValueArray,
                $this->locale
            )
        );
    }

    /** @test */
    public function shouldHasMonthTypeIndicatorInCreateDictionariesFromValuesReturnMonthArray()
    {
        $this->givenHasMonthTypeIndicatorInCreateDictionaries();
        $this->thenReturnMonthArray();
    }

    private function givenHasMonthTypeIndicatorInCreateDictionaries()
    {
        $this->typeIndicator->method('hasArea')->willReturn(false);
        $this->typeIndicator->method('getNumIndependentVars')->willReturn(0);
        $this->typeIndicator->method('hasYear')->willReturn(false);
        $this->typeIndicator->method('hasMonth')->willReturn(true);
        $this->typeIndicator->method('hasTerm')->willReturn(false);

        $this->typeValueArray->method('getMonths')->willReturn([]);
        $this->monthRepository->method('getMonthsByFilter')->willReturn([$this->month]);

        $this->createDictionariesFromValues = new CreateDictionariesFromValues(
            $this->areaRepository,
            $this->independentVariableRepository,
            $this->yearRepository,
            $this->monthRepository,
            $this->termRepository
        );
    }

    private function thenReturnMonthArray()
    {
        $this->assertEquals(
            [new MonthDictionary([$this->month])],
            $this->createDictionariesFromValues->getDictionaries(
                $this->typeIndicator,
                $this->typeValueArray,
                $this->locale
            )
        );
    }

    /** @test */
    public function shouldHasTermTypeIndicatorInCreateDictionariesFromValuesReturnTermArray()
    {
        $this->givenHasTermTypeIndicatorInCreateDictionaries();
        $this->thenReturnTermArray();
    }

    private function givenHasTermTypeIndicatorInCreateDictionaries()
    {
        $this->typeIndicator->method('hasArea')->willReturn(false);
        $this->typeIndicator->method('getNumIndependentVars')->willReturn(0);
        $this->typeIndicator->method('hasYear')->willReturn(false);
        $this->typeIndicator->method('hasMonth')->willReturn(false);
        $this->typeIndicator->method('hasTerm')->willReturn(true);

        $this->typeValueArray->method('getMonths')->willReturn([]);
        $this->termRepository->method('getMonthsByFilter')->willReturn([$this->term]);

        $this->createDictionariesFromValues = new CreateDictionariesFromValues(
            $this->areaRepository,
            $this->independentVariableRepository,
            $this->yearRepository,
            $this->monthRepository,
            $this->termRepository
        );
    }

    private function thenReturnTermArray()
    {
        $this->assertEquals(
            [new TermDictionary([$this->term])],
            $this->createDictionariesFromValues->getDictionaries(
                $this->typeIndicator,
                $this->typeValueArray,
                $this->locale
            )
        );
    }

    /** @test */
    public function shouldHasOneIndependentVariableTypeIndicatorInCreateDictionariesFromValuesReturnOneIndependentVariableArray()
    {
        $this->givenHasOneIndependentVariableTypeIndicatorInCreateDictionaries();
        $this->thenReturnOneIndependentVariableArray();
    }

    private function givenHasOneIndependentVariableTypeIndicatorInCreateDictionaries()
    {
        $this->typeIndicator->method('hasArea')->willReturn(false);
        $this->typeIndicator->method('getNumIndependentVars')->willReturn(1);
        $this->typeIndicator->method('hasYear')->willReturn(false);
        $this->typeIndicator->method('hasMonth')->willReturn(false);
        $this->typeIndicator->method('hasTerm')->willReturn(false);

        $this->typeValueArray->method('getIndependentVariable')->willReturn([]);
        $this->independentVariableRepository->method('getIndependentVariablesByFilter')->willReturn([$this->independentVariable]);

        $this->createDictionariesFromValues = new CreateDictionariesFromValues(
            $this->areaRepository,
            $this->independentVariableRepository,
            $this->yearRepository,
            $this->monthRepository,
            $this->termRepository
        );
    }

    private function thenReturnOneIndependentVariableArray()
    {
        $this->assertEquals(
            [new IndependentVariableDictionary([$this->independentVariable])],
            $this->createDictionariesFromValues->getDictionaries(
                $this->typeIndicator,
                $this->typeValueArray,
                $this->locale
            )
        );
    }

    /** @test */
    public function shouldFullTypeIndicatorInCreateDictionariesFromValuesReturnFullArray()
    {
        $this->givenFullTypeIndicatorInCreateDictionaries();
        $this->thenReturnFullArray();
    }

    private function givenFullTypeIndicatorInCreateDictionaries()
    {
        $this->typeIndicator->method('hasArea')->willReturn(true);
        $this->typeIndicator->method('getNumIndependentVars')->willReturn(1);
        $this->typeIndicator->method('hasYear')->willReturn(true);
        $this->typeIndicator->method('hasMonth')->willReturn(true);
        $this->typeIndicator->method('hasTerm')->willReturn(true);

        $this->typeValueArray->method('getAreas')->willReturn([]);
        $this->typeValueArray->method('getIndependentVariable')->willReturn([]);
        $this->typeValueArray->method('getYears')->willReturn([]);
        $this->typeValueArray->method('getMonths')->willReturn([]);

        $this->areaRepository->method('getAreasByFilter')->willReturn([$this->area]);
        $this->independentVariableRepository->method('getIndependentVariablesByFilter')->willReturn([$this->independentVariable]);
        $this->yearRepository->method('getYearsByFilter')->willReturn([$this->year]);
        $this->monthRepository->method('getMonthsByFilter')->willReturn([$this->month]);
        $this->termRepository->method('getMonthsByFilter')->willReturn([$this->term]);

        $this->createDictionariesFromValues = new CreateDictionariesFromValues(
            $this->areaRepository,
            $this->independentVariableRepository,
            $this->yearRepository,
            $this->monthRepository,
            $this->termRepository
        );
    }

    private function thenReturnFullArray()
    {
        $this->assertEquals(
            [
                new AreaDictionary([$this->area]),
                new IndependentVariableDictionary([$this->independentVariable]),
                new YearDictionary([$this->year]),
                new MonthDictionary([$this->month]),
                new TermDictionary([$this->term]),
            ],
            $this->createDictionariesFromValues->getDictionaries(
                $this->typeIndicator,
                $this->typeValueArray,
                $this->locale
            )
        );
    }
}