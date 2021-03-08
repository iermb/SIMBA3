<?php

namespace Component\Application\Value\UseCase;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Application\Value\Request\ReadDictionaryVariablesRequest;
use SIMBA3\Component\Application\Value\UseCase\ReadDictionaryVariablesUseCase;
use SIMBA3\Component\Domain\Value\Entity\AreaYearValue;
use SIMBA3\Component\Domain\Value\Entity\YearValue;
use SIMBA3\Component\Domain\Value\Service\AreaDictionary;
use SIMBA3\Component\Domain\Value\Service\TypeValueArray;
use SIMBA3\Component\Domain\Value\Service\YearDictionary;
use SIMBA3\Component\Domain\Variable\Entity\Area;
use SIMBA3\Component\Domain\Variable\Entity\TypeArea;
use SIMBA3\Component\Domain\Variable\Repository\AreaRepository;
use SIMBA3\Component\Domain\Variable\Repository\YearRepository;

class ReadDictionaryVariablesUseCaseTest extends TestCase
{
    private ReadDictionaryVariablesUseCase $readDictionaryVariablesUseCase;
    private AreaRepository                 $areaRepository;
    private YearRepository                 $yearRepository;
    private ReadDictionaryVariablesRequest $readDictionaryVariablesRequest;
    private TypeValueArray                 $typeValueArray;
    private AreaYearValue $areaYearValue1;
    private AreaYearValue $areaYearValue2;
    private AreaYearValue $areaYearValue3;
    private YearValue $yearValue1;
    private YearValue $yearValue2;
    private YearValue $yearValue3;
    private Area $area1;
    private Area $area2;
    private TypeArea $typeArea;

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
        $this->yearRepository = $this->createMock(YearRepository::class);
        $this->readDictionaryVariablesRequest = $this->createMock(ReadDictionaryVariablesRequest::class);
        $this->typeValueArray = $this->createMock(TypeValueArray::class);
        $this->areaYearValue1 = $this->createMock(AreaYearValue::class);
        $this->areaYearValue2 = $this->createMock(AreaYearValue::class);
        $this->areaYearValue3 = $this->createMock(AreaYearValue::class);
        $this->yearValue1 = $this->createMock(YearValue::class);
        $this->yearValue2 = $this->createMock(YearValue::class);
        $this->yearValue3 = $this->createMock(YearValue::class);
        $this->area1 = $this->createMock(Area::class);
        $this->area2 = $this->createMock(Area::class);
        $this->typeArea = $this->createMock(TypeArea::class);
    }

    private function givenAReadDictionaryVariablesUseCase(): void
    {
        $this->readDictionaryVariablesUseCase = new ReadDictionaryVariablesUseCase($this->areaRepository, $this->yearRepository);
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
