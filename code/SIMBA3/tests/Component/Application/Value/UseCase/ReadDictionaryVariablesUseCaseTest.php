<?php

namespace Component\Application\Value\UseCase;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Domain\Variable\Entity\TypeIndependentVariable;
use SIMBA3\Component\Application\Value\Request\ReadDictionaryVariablesRequest;
use SIMBA3\Component\Application\Value\UseCase\ReadDictionaryVariablesUseCase;
use SIMBA3\Component\Domain\Value\Entity\AreaIndependentVariable2YearValue;
use SIMBA3\Component\Domain\Value\Entity\AreaIndependentVariable1YearValue;
use SIMBA3\Component\Domain\Value\Entity\AreaYearValue;
use SIMBA3\Component\Domain\Value\Entity\YearValue;
use SIMBA3\Component\Domain\Value\Service\AreaDictionary;
use SIMBA3\Component\Domain\Value\Service\IndependentVariableDictionary;
use SIMBA3\Component\Domain\Value\Service\TypeValueArray;
use SIMBA3\Component\Domain\Value\Service\YearDictionary;
use SIMBA3\Component\Domain\Variable\Entity\Area;
use SIMBA3\Component\Domain\Variable\Entity\IndependentVariable;
use SIMBA3\Component\Domain\Variable\Entity\TypeArea;
use SIMBA3\Component\Domain\Variable\Entity\Year;
use SIMBA3\Component\Domain\Variable\Repository\AreaRepository;
use SIMBA3\Component\Domain\Variable\Repository\IndependentVariableRepository;
use SIMBA3\Component\Domain\Variable\Repository\YearRepository;

class ReadDictionaryVariablesUseCaseTest extends TestCase
{
    private ReadDictionaryVariablesUseCase $readDictionaryVariablesUseCase;
    private AreaRepository                 $areaRepository;
    private IndependentVariableRepository  $independentVariableRepository;
    private YearRepository                 $yearRepository;
    private ReadDictionaryVariablesRequest $readDictionaryVariablesRequest;
    private TypeValueArray                 $typeValueArray;
    private AreaIndependentVariable2YearValue $areaIndependentVariable2YearValue1;
    private AreaIndependentVariable2YearValue $areaIndependentVariable2YearValue2;
    private AreaIndependentVariable2YearValue $areaIndependentVariable2YearValue3;
    private AreaIndependentVariable1YearValue $areaIndependentVariable1YearValue1;
    private AreaIndependentVariable1YearValue $areaIndependentVariable1YearValue2;
    private AreaIndependentVariable1YearValue $areaIndependentVariable1YearValue3;
    private AreaYearValue $areaYearValue1;
    private AreaYearValue $areaYearValue2;
    private AreaYearValue $areaYearValue3;
    private YearValue $yearValue1;
    private YearValue $yearValue2;
    private YearValue $yearValue3;
    private Area $area1;
    private Area $area2;
    private TypeArea $typeArea;
    private IndependentVariable $independentVariable1;
    private IndependentVariable $independentVariable2;
    private TypeIndependentVariable $typeIndependentVariable;
    private Year $year;

    /** @test */
    public function shouldReadDictionaryVariableUseCaseWhenTypeIsAreaIndependentVariable2YearValueReturnFourDictionaries(): void
    {
        $this->givenAReadDictionaryVariablesUseCase();
        $this->whenReadDictionaryVariablesRequestIsAreaIndependentVariable2YearValueType();
        $this->whenAreaRepositoryReturnValidAreasAndIndependentVariable2RepositoryReturnValidIndependentVariables();
        $this->thenReturnAreaAndIndependentVariable2AndYearDictionary();
    }

    /** @test */
    public function shouldReadDictionaryVariableUseCaseWhenTypeIsAreaIndependentVariable1YearValueReturnThreeDictionaries(): void
    {
        $this->givenAReadDictionaryVariablesUseCase();
        $this->whenReadDictionaryVariablesRequestIsAreaIndependentVariable1YearValueType();
        $this->whenAreaRepositoryReturnValidAreasAndIndependentVariable1RepositoryReturnValidIndependentVariables();
        $this->thenReturnAreaAndIndependentVariable1AndYearDictionary();
    }

    /** @test */
    public function shouldReadDictionaryVariableUseCaseWhenTypeIsAreaYearValueReturnTwoDictionaries(): void
    {
        $this->givenAReadDictionaryVariablesUseCase();
        $this->whenReadDictionaryVariablesRequestIsAreaYearValueType();
        $this->whenAreaRepositoryReturnValidAreas();
        $this->thenReturnAreaDictionaryAndYearDictionary();
    }

    /** @test */
    public function shouldReadDictionaryVariableUseCaseWhenTypeIsYearValueReturnOneDictionary(): void
    {
        $this->givenAReadDictionaryVariablesUseCase();
        $this->whenReadDictionaryVariablesRequestIsYearValueType();
        $this->thenReturnYearDictionary();
    }

    /** @test */
    public function shouldReadDictionaryVariableUseCaseReturnExceptionWhenNotExistsTheType(): void
    {
        $this->givenAReadDictionaryVariablesUseCase();
        $this->whenReadDictionaryVariablesRequestIsNotValidType();
        $this->thenExpectsInvalidArgumentException();
        $this->whenReadDictionaryVariablesUseCaseIsExecuted();
    }


    protected function setUp(): void
    {
        parent::setUp();
        $this->areaRepository = $this->createMock(AreaRepository::class);
        $this->independentVariableRepository = $this->createMock(IndependentVariableRepository::class);
        $this->yearRepository = $this->createMock(YearRepository::class);

        $this->readDictionaryVariablesRequest = $this->createMock(ReadDictionaryVariablesRequest::class);

        $this->typeValueArray = $this->createMock(TypeValueArray::class);

        $this->areaIndependentVariable2YearValue1 = $this->createMock(AreaIndependentVariable2YearValue::class);
        $this->areaIndependentVariable2YearValue2 = $this->createMock(AreaIndependentVariable2YearValue::class);
        $this->areaIndependentVariable2YearValue3 = $this->createMock(AreaIndependentVariable2YearValue::class);

        $this->areaIndependentVariable1YearValue1 = $this->createMock(AreaIndependentVariable1YearValue::class);
        $this->areaIndependentVariable1YearValue2 = $this->createMock(AreaIndependentVariable1YearValue::class);
        $this->areaIndependentVariable1YearValue3 = $this->createMock(AreaIndependentVariable1YearValue::class);

        $this->areaYearValue1 = $this->createMock(AreaYearValue::class);
        $this->areaYearValue2 = $this->createMock(AreaYearValue::class);
        $this->areaYearValue3 = $this->createMock(AreaYearValue::class);

        $this->yearValue1 = $this->createMock(YearValue::class);
        $this->yearValue2 = $this->createMock(YearValue::class);
        $this->yearValue3 = $this->createMock(YearValue::class);

        $this->area1 = $this->createMock(Area::class);
        $this->area2 = $this->createMock(Area::class);
        $this->typeArea = $this->createMock(TypeArea::class);

        $this->typeIndependentVariable = $this->createMock(TypeIndependentVariable::class);
        $this->independentVariable1 = $this->createMock(IndependentVariable::class);
        $this->independentVariable2 = $this->createMock(IndependentVariable::class);

        $this->year = $this->createMock(Year::class);
    }

    private function givenAReadDictionaryVariablesUseCase(): void
    {
        $this->readDictionaryVariablesUseCase = new ReadDictionaryVariablesUseCase(
            $this->areaRepository,
            $this->independentVariableRepository,
            $this->yearRepository
        );
    }

    private function whenReadDictionaryVariablesRequestIsAreaIndependentVariable2YearValueType(): void
    {
        $this->readDictionaryVariablesRequest->method("getType")->willReturn("AREA_INDEPENDENT_VARIABLE_2_YEAR_VALUE");
        $this->readDictionaryVariablesRequest->method("getTypeValueArray")->willReturn($this->typeValueArray);

        $this->typeValueArray->method("getValuesAsArray")->willReturn([
            $this->areaIndependentVariable2YearValue1,
            $this->areaIndependentVariable2YearValue2,
            $this->areaIndependentVariable2YearValue3
        ]);

        $this->areaIndependentVariable2YearValue1->method("getTypeAreaId")->willReturn(1);
        $this->areaIndependentVariable2YearValue1->method("getAreaId")->willReturn(2);
        $this->areaIndependentVariable2YearValue1->method("getTypeIndependentVariable1Id")->willReturn(3);
        $this->areaIndependentVariable2YearValue1->method("getIndependentVariable1Id")->willReturn(4);
        $this->areaIndependentVariable2YearValue1->method("getTypeIndependentVariable2Id")->willReturn(5);
        $this->areaIndependentVariable2YearValue1->method("getIndependentVariable1Id")->willReturn(6);
        $this->areaIndependentVariable2YearValue1->method("getYear")->willReturn(7);

        $this->areaIndependentVariable2YearValue2->method("getTypeAreaId")->willReturn(8);
        $this->areaIndependentVariable2YearValue2->method("getAreaId")->willReturn(9);
        $this->areaIndependentVariable2YearValue2->method("getTypeIndependentVariable1Id")->willReturn(10);
        $this->areaIndependentVariable2YearValue2->method("getIndependentVariable1Id")->willReturn(11);
        $this->areaIndependentVariable2YearValue2->method("getTypeIndependentVariable2Id")->willReturn(12);
        $this->areaIndependentVariable2YearValue2->method("getIndependentVariable2Id")->willReturn(13);
        $this->areaIndependentVariable2YearValue2->method("getYear")->willReturn(14);

        $this->areaIndependentVariable2YearValue3->method("getTypeAreaId")->willReturn(15);
        $this->areaIndependentVariable2YearValue3->method("getAreaId")->willReturn(16);
        $this->areaIndependentVariable2YearValue3->method("getTypeIndependentVariable1Id")->willReturn(17);
        $this->areaIndependentVariable2YearValue3->method("getIndependentVariable1Id")->willReturn(18);
        $this->areaIndependentVariable2YearValue3->method("getTypeIndependentVariable2Id")->willReturn(19);
        $this->areaIndependentVariable2YearValue3->method("getIndependentVariable2Id")->willReturn(20);
        $this->areaIndependentVariable2YearValue3->method("getYear")->willReturn(21);
    }

    private function whenReadDictionaryVariablesRequestIsAreaIndependentVariable1YearValueType(): void
    {
        $this->readDictionaryVariablesRequest->method("getType")->willReturn("AREA_INDEPENDENT_VARIABLE_1_YEAR_VALUE");
        $this->readDictionaryVariablesRequest->method("getTypeValueArray")->willReturn($this->typeValueArray);

        $this->typeValueArray->method("getValuesAsArray")->willReturn([
            $this->areaIndependentVariable1YearValue1,
            $this->areaIndependentVariable1YearValue2,
            $this->areaIndependentVariable1YearValue3
        ]);

        $this->areaIndependentVariable1YearValue1->method("getTypeAreaId")->willReturn(1);
        $this->areaIndependentVariable1YearValue1->method("getAreaId")->willReturn(2);
        $this->areaIndependentVariable1YearValue1->method("getTypeIndependentVariableId")->willReturn(3);
        $this->areaIndependentVariable1YearValue1->method("getIndependentVariableId")->willReturn(4);
        $this->areaIndependentVariable1YearValue1->method("getYear")->willReturn(5);

        $this->areaIndependentVariable1YearValue2->method("getTypeAreaId")->willReturn(6);
        $this->areaIndependentVariable1YearValue2->method("getAreaId")->willReturn(7);
        $this->areaIndependentVariable1YearValue2->method("getTypeIndependentVariableId")->willReturn(8);
        $this->areaIndependentVariable1YearValue2->method("getIndependentVariableId")->willReturn(9);
        $this->areaIndependentVariable1YearValue2->method("getYear")->willReturn(10);

        $this->areaIndependentVariable1YearValue3->method("getTypeAreaId")->willReturn(11);
        $this->areaIndependentVariable1YearValue3->method("getAreaId")->willReturn(12);
        $this->areaIndependentVariable1YearValue3->method("getTypeIndependentVariableId")->willReturn(13);
        $this->areaIndependentVariable1YearValue3->method("getIndependentVariableId")->willReturn(14);
        $this->areaIndependentVariable1YearValue3->method("getYear")->willReturn(15);
    }

    private function whenReadDictionaryVariablesRequestIsAreaYearValueType(): void
    {
        $this->readDictionaryVariablesRequest->method("getType")->willReturn("AREA_YEAR_VALUE");
        $this->readDictionaryVariablesRequest->method("getTypeValueArray")->willReturn($this->typeValueArray);
        $this->typeValueArray->method("getValuesAsArray")->willReturn([
            $this->areaYearValue1,
            $this->areaYearValue2,
            $this->areaYearValue3
        ]);
        $this->areaYearValue1->method("getTypeAreaId")->willReturn(102);
        $this->areaYearValue1->method("getAreaId")->willReturn(1);
        $this->areaYearValue1->method("getYear")->willReturn(2019);
        $this->areaYearValue2->method("getTypeAreaId")->willReturn(102);
        $this->areaYearValue2->method("getAreaId")->willReturn(2);
        $this->areaYearValue2->method("getYear")->willReturn(2019);
        $this->areaYearValue3->method("getTypeAreaId")->willReturn(102);
        $this->areaYearValue3->method("getAreaId")->willReturn(1);
        $this->areaYearValue3->method("getYear")->willReturn(2020);
    }

    private function whenReadDictionaryVariablesRequestIsYearValueType(): void
    {
        $this->readDictionaryVariablesRequest->method("getType")->willReturn("YEAR_VALUE");
        $this->readDictionaryVariablesRequest->method("getTypeValueArray")->willReturn($this->typeValueArray);

        $this->typeValueArray->method("getValuesAsArray")->willReturn([
            $this->yearValue1,
            $this->yearValue2,
            $this->yearValue3
        ]);

        $this->yearValue1->method("getYear")->willReturn(2019);
        $this->yearValue2->method("getYear")->willReturn(2019);
        $this->yearValue3->method("getYear")->willReturn(2020);
    }

    private function whenReadDictionaryVariablesRequestIsNotValidType(): void
    {
        $this->readDictionaryVariablesRequest->method("getType")->willReturn("NOT_VALID_TYPE");
    }

    private function whenAreaRepositoryReturnValidAreasAndIndependentVariable2RepositoryReturnValidIndependentVariables(): void
    {
        $this->typeArea->method("getId")->willReturn(102);
        $this->typeArea->method("getName")->willReturn("Type area test");

        $this->area1->method("getType")->willReturn($this->typeArea);
        $this->area1->method("getId")->willReturn(1);
        $this->area1->method("getName")->willReturn("Area name 1");

        $this->area2->method("getType")->willReturn($this->typeArea);
        $this->area2->method("getId")->willReturn(2);
        $this->area2->method("getName")->willReturn("Area name 2");

        $this->areaRepository->method("getAreasByFilter")->willReturn([$this->area1, $this->area2]);

        $this->typeIndependentVariable->method("getId")->willReturn(102);
        $this->typeIndependentVariable->method("getName")->willReturn("Type area test");

        $this->independentVariable1->method("getType")->willReturn($this->typeIndependentVariable);
        $this->independentVariable1->method("getId")->willReturn(1);
        $this->independentVariable1->method("getName")->willReturn("Area name 1");

        $this->independentVariable2->method("getType")->willReturn($this->typeIndependentVariable);
        $this->independentVariable2->method("getId")->willReturn(1);
        $this->independentVariable2->method("getName")->willReturn("Area name 1");

        $this->independentVariableRepository->method("getIndependentVariablesByFilter")->willReturn([$this->independentVariable1, $this->independentVariable2]);
    }

    private function whenAreaRepositoryReturnValidAreasAndIndependentVariable1RepositoryReturnValidIndependentVariables(): void
    {
        $this->typeArea->method("getId")->willReturn(102);
        $this->typeArea->method("getName")->willReturn("Type area test");

        $this->area1->method("getType")->willReturn($this->typeArea);
        $this->area1->method("getId")->willReturn(1);
        $this->area1->method("getName")->willReturn("Area name 1");

        $this->area2->method("getType")->willReturn($this->typeArea);
        $this->area2->method("getId")->willReturn(2);
        $this->area2->method("getName")->willReturn("Area name 2");

        $this->areaRepository->method("getAreasByFilter")->willReturn([$this->area1, $this->area2]);

        $this->typeIndependentVariable->method("getId")->willReturn(102);
        $this->typeIndependentVariable->method("getName")->willReturn("Type area test");

        $this->independentVariable1->method("getType")->willReturn($this->typeIndependentVariable);
        $this->independentVariable1->method("getId")->willReturn(1);
        $this->independentVariable1->method("getName")->willReturn("Area name 1");

        $this->independentVariable2->method("getType")->willReturn($this->typeIndependentVariable);
        $this->independentVariable2->method("getId")->willReturn(1);
        $this->independentVariable2->method("getName")->willReturn("Area name 1");

        $this->independentVariableRepository->method("getIndependentVariablesByFilter")->willReturn([$this->independentVariable1, $this->independentVariable2]);
    }

    private function whenAreaRepositoryReturnValidAreas(): void
    {
        $this->areaRepository->method("getAreasByFilter")->willReturn([$this->area1, $this->area2]);
        $this->typeArea->method("getId")->willReturn(102);
        $this->typeArea->method("getName")->willReturn("Type area test");
        $this->area1->method("getType")->willReturn($this->typeArea);
        $this->area1->method("getId")->willReturn(1);
        $this->area1->method("getName")->willReturn("Area name 1");
        $this->area2->method("getType")->willReturn($this->typeArea);
        $this->area2->method("getId")->willReturn(2);
        $this->area2->method("getName")->willReturn("Area name 2");
    }

    private function thenExpectsInvalidArgumentException(): void
    {
        $this->expectException(InvalidArgumentException::class);
    }

    private function whenReadDictionaryVariablesUseCaseIsExecuted(): void
    {
        $this->readDictionaryVariablesUseCase->execute($this->readDictionaryVariablesRequest);
    }

    private function thenReturnAreaAndIndependentVariable2AndYearDictionary(): void
    {
        $arrayDictionaries = $this->readDictionaryVariablesUseCase->execute($this->readDictionaryVariablesRequest);
        $this->assertCount(4, $arrayDictionaries);
        $this->assertInstanceOf(AreaDictionary::class, $arrayDictionaries[0]);
        $this->assertInstanceOf(IndependentVariableDictionary::class, $arrayDictionaries[1]);
        $this->assertInstanceOf(IndependentVariableDictionary::class, $arrayDictionaries[2]);
        $this->assertInstanceOf(YearDictionary::class, $arrayDictionaries[3]);
    }

    private function thenReturnAreaAndIndependentVariable1AndYearDictionary(): void
    {
        $arrayDictionaries = $this->readDictionaryVariablesUseCase->execute($this->readDictionaryVariablesRequest);
        $this->assertCount(3, $arrayDictionaries);
        $this->assertInstanceOf(AreaDictionary::class, $arrayDictionaries[0]);
        $this->assertInstanceOf(IndependentVariableDictionary::class, $arrayDictionaries[1]);
        $this->assertInstanceOf(YearDictionary::class, $arrayDictionaries[2]);
    }

    private function thenReturnAreaDictionaryAndYearDictionary(): void
    {
        $arrayDictionaries = $this->readDictionaryVariablesUseCase->execute($this->readDictionaryVariablesRequest);
        $this->assertCount(2, $arrayDictionaries);
        $this->assertInstanceOf(AreaDictionary::class, $arrayDictionaries[0]);
        $this->assertInstanceOf(YearDictionary::class, $arrayDictionaries[1]);
    }

    private function thenReturnYearDictionary(): void
    {
        $arrayDictionaries = $this->readDictionaryVariablesUseCase->execute($this->readDictionaryVariablesRequest);
        $this->assertCount(1, $arrayDictionaries);
        $this->assertInstanceOf(YearDictionary::class, $arrayDictionaries[0]);
    }
}
