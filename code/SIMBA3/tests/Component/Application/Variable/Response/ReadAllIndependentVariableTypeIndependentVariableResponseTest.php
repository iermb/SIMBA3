<?php


namespace SIMBA3\Component\Application\Variable\Response;


use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Domain\Variable\Entity\IndependentVariable;
use SIMBA3\Component\Domain\Variable\Entity\TypeIndependentVariable;

class ReadAllIndependentVariableTypeIndependentVariableResponseTest extends TestCase
{
    private ReadAllIndependentVariableTypeIndependentVariableResponse $readAllIndependentVariableTypeIndependentVariableResponse;
    private IndependentVariable $independentVariable1;
    private IndependentVariable $independentVariable2;
    private TypeIndependentVariable $typeIndependentVariable1;
    private TypeIndependentVariable $typeIndependentVariable2;
    private array $independentVariableArray;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->independentVariable1 = $this->createMock(IndependentVariable::class);
        $this->independentVariable2 = $this->createMock(IndependentVariable::class);
        $this->typeIndependentVariable1 = $this->createMock(TypeIndependentVariable::class);
        $this->typeIndependentVariable2 = $this->createMock(TypeIndependentVariable::class);
    }
    
    /** @test */
    public function shouldReadAllIndependentVariableTypeIndependentVariableResponseTestReturnEmptyArray(): void
    {
        $this->givenEmptyIndependentVariableArray();
        $this->thenReturnEmptyArray();
    }

    private function givenEmptyIndependentVariableArray(): void
    {
        $this->readAllIndependentVariableTypeIndependentVariableResponse = new ReadAllIndependentVariableTypeIndependentVariableResponse([]);
    }

    private function thenReturnEmptyArray(): void
    {
        $this->assertEquals(
            [],
            $this->readAllIndependentVariableTypeIndependentVariableResponse->getAllIndependentVariable()
        );
    }

    /** @test */
    public function shouldReadAllIndependentVariableTypeIndependentVariableResponseTestReturnOneElementArray(): void
    {
        $this->givenOneElementIndependentVariableArray();
        $this->thenReturnOneElementArray();
    }

    private function givenOneElementIndependentVariableArray(): void
    {
        $this->createIndependentVariable1();
        $this->readAllIndependentVariableTypeIndependentVariableResponse = new ReadAllIndependentVariableTypeIndependentVariableResponse([
            $this->independentVariable1
        ]);
    }

    private function createIndependentVariable1(): void
    {
        $this->typeIndependentVariable1->method('getName')->willReturn('Type Independent Variable 1');

        $this->independentVariable1->method('getId')->willReturn(1);
        $this->independentVariable1->method('getName')->willReturn('Independent Variable 1');
        $this->independentVariable1->method('getType')->willReturn($this->typeIndependentVariable1);
    }

    private function thenReturnOneElementArray(): void
    {
        $this->assertEquals(
            [
                [
                     'id' => 1,
                     'name' => 'Independent Variable 1',
                     'type_name' => 'Type Independent Variable 1',
                ]
            ],
            $this->readAllIndependentVariableTypeIndependentVariableResponse->getAllIndependentVariable()
        );
    }

    /** @test */
    public function shouldReadAllIndependentVariableTypeIndependentVariableResponseTestReturnTwoElementsArray(): void
    {
        $this->givenTwoElementsIndependentVariableArray();
        $this->thenReturnTwoElementsArray();
    }

    private function givenTwoElementsIndependentVariableArray(): void
    {
        $this->createIndependentVariable1();

        $this->typeIndependentVariable2->method('getName')->willReturn('Type Independent Variable 2');
        $this->independentVariable2->method('getId')->willReturn(2);
        $this->independentVariable2->method('getName')->willReturn('Independent Variable 2');
        $this->independentVariable2->method('getType')->willReturn($this->typeIndependentVariable2);

        $this->readAllIndependentVariableTypeIndependentVariableResponse = new ReadAllIndependentVariableTypeIndependentVariableResponse([
            $this->independentVariable1,
            $this->independentVariable2,
        ]);
    }

    private function thenReturnTwoElementsArray(): void
    {
        $this->assertEquals(
            [
                [
                    'id' => 1,
                    'name' => 'Independent Variable 1',
                    'type_name' => 'Type Independent Variable 1',
                ],
                [
                    'id' => 2,
                    'name' => 'Independent Variable 2',
                    'type_name' => 'Type Independent Variable 2',
                ],
            ],
            $this->readAllIndependentVariableTypeIndependentVariableResponse->getAllIndependentVariable()
        );
    }

}