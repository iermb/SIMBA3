<?php


namespace SIMBA3\Component\Domain\Variable\Service;


use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Domain\Variable\Entity\IndependentVariable;
use SIMBA3\Component\Domain\Variable\Entity\TypeIndependentVariable;

class IndependentVariableDictionaryTest extends TestCase
{
    private IndependentVariableDictionary $independentVariableDictionary;
    private IndependentVariable $independentVariable1;
    private IndependentVariable $independentVariable2;
    private TypeIndependentVariable $typeIndependentVariable1;
    private TypeIndependentVariable $typeIndependentVariable2;

    protected function setUp(): void
    {
        parent::setUp();
        $this->independentVariable1 = $this->createMock(IndependentVariable::class);
        $this->independentVariable2 = $this->createMock(IndependentVariable::class);
        $this->typeIndependentVariable1 = $this->createMock(TypeIndependentVariable::class);
        $this->typeIndependentVariable2 = $this->createMock(TypeIndependentVariable::class);
    }

    /**
     * @test
     */
    public function shouldIndependentVariableDictionaryWithoutIndependentVariablesReturnEmptyArray(): void
    {
        $this->givenIndependentVariableDictionaryWithoutIndependentVariables();
        $this->thenReturnEmptyArray();
    }

    private function givenIndependentVariableDictionaryWithoutIndependentVariables(): void
    {
        $this->independentVariableDictionary = new IndependentVariableDictionary([]);
    }

    private function thenReturnEmptyArray(): void
    {
        $this->assertEquals([],$this->independentVariableDictionary->getDictionaryValuesAsArray());
    }

    /**
     * @test
     */
    public function shouldIndependentVariableDictionaryWithAnIndependentVariableReturnArrayWithOneElement(): void
    {
        $this->givenIndependentVariableDictionaryWithAnIndependentVariable();
        $this->thenReturnArrayWithOneElement();
    }

    private function createIndependentVariable():void
    {
        $this->typeIndependentVariable1->method('getCode')->willReturn(456);
        $this->typeIndependentVariable1->method('getId')->willReturn(999);
        $this->typeIndependentVariable1->method('getName')->willReturn('Type Independent Variable Name');

        $this->independentVariable1->method('getType')->willReturn($this->typeIndependentVariable1);
        $this->independentVariable1->method('getName')->willReturn('Independent Variable Name');
        $this->independentVariable1->method('getCode')->willReturn(123);
    }

    private function givenIndependentVariableDictionaryWithAnIndependentVariable(): void
    {
        $this->createIndependentVariable();
        $this->independentVariableDictionary = new IndependentVariableDictionary([$this->independentVariable1]);
    }

    private function thenReturnArrayWithOneElement(): void
    {
        $this->assertEquals(
            [
                [
                    "code" => 456,
                    "name" => 'Type Independent Variable Name',
                    "independentVariables" => [
                        [
                            "code" => 123,
                            "name" => 'Independent Variable Name',
                        ],
                    ],
                ]
            ],
            $this->independentVariableDictionary->getDictionaryValuesAsArray());
    }

    /**
     * @test
     */
    public function shouldIndependentVariableDictionaryWithTwoIndependentVariablesReturnArrayWithTwoElements(): void
    {
        $this->givenIndependentVariableDictionaryWithTwoIndependentVariables();
        $this->thenReturnArrayWithTwoElements();
    }

    private function givenIndependentVariableDictionaryWithTwoIndependentVariables(): void
    {
        $this->typeIndependentVariable2->method('getCode')->willReturn(789);
        $this->typeIndependentVariable2->method('getId')->willReturn(888);
        $this->typeIndependentVariable2->method('getName')->willReturn('Type Independent Variable Name 2');

        $this->independentVariable2->method('getType')->willReturn($this->typeIndependentVariable2);
        $this->independentVariable2->method('getName')->willReturn('Independent Variable Name 2');
        $this->independentVariable2->method('getCode')->willReturn(987);

        $this->createIndependentVariable();
        $this->independentVariableDictionary = new IndependentVariableDictionary([$this->independentVariable1, $this->independentVariable2]);
    }

    private function thenReturnArrayWithTwoElements(): void
    {
        $this->assertEquals(
            [
                [
                    "code" => 456,
                    "name" => 'Type Independent Variable Name',
                    "independentVariables" => [
                        [
                            "code" => 123,
                            "name" => 'Independent Variable Name',
                        ],
                    ],
                ],
                [
                    "code" => 789,
                    "name" => 'Type Independent Variable Name 2',
                    "independentVariables" => [
                        [
                            "code" => 987,
                            "name" => 'Independent Variable Name 2',
                        ],
                    ],
                ],
            ],
            $this->independentVariableDictionary->getDictionaryValuesAsArray());
    }


}