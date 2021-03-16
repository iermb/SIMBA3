<?php


namespace SIMBA3\Component\Application\Variable\Response;


use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Domain\Variable\Entity\TypeIndependentVariable;

class ReadAllTypeIndependentVariableResponseTest extends TestCase
{
    private ReadAllTypeIndependentVariableResponse $readAllTypeIndependentVariableResponse;
    private TypeIndependentVariable $typeIndependentVariable1;
    private TypeIndependentVariable $typeIndependentVariable2;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->typeIndependentVariable1 = $this->createMock(TypeIndependentVariable::class);
        $this->typeIndependentVariable2 = $this->createMock(TypeIndependentVariable::class);
    }

    /** @test */
    public function shouldReadAllTypeIndependentVariableResponseReturnEmptyArray(): void
    {
        $this->givenEmptyTypeIndependentVariableArray();
        $this->thenReturnEmptyArray();
    }

    private function givenEmptyTypeIndependentVariableArray()
    {
        $this->readAllTypeIndependentVariableResponse = new ReadAllTypeIndependentVariableResponse([]);
    }

    private function thenReturnEmptyArray()
    {
        $this->assertEquals(
            [],
            $this->readAllTypeIndependentVariableResponse->getAllTypeIndependentVariable()
        );
    }

    /** @test */
    public function shouldReadAllTypeIndependentVariableResponseReturnOneElementArray(): void
    {
        $this->givenOneElementTypeIndependentVariableArray();
        $this->thenReturnOneElementArray();
    }

    private function givenOneElementTypeIndependentVariableArray(): void
    {
        $this->createTypeIndependentVariable();
        $this->readAllTypeIndependentVariableResponse = new ReadAllTypeIndependentVariableResponse([
            $this->typeIndependentVariable1
        ]);
    }

    private function createTypeIndependentVariable(): void
    {
        $this->typeIndependentVariable1->method('getId')->willReturn(1);
        $this->typeIndependentVariable1->method('getName')->willReturn('Independent Variable 1');
    }

    private function thenReturnOneElementArray(): void
    {
        $this->assertEquals(
             [
                 [
                    'id' => 1,
                    'name' =>  'Independent Variable 1',
                 ],
             ],
            $this->readAllTypeIndependentVariableResponse->getAllTypeIndependentVariable()
        );
    }

    /** @test */
    public function shouldReadAllTypeIndependentVariableResponseReturnTwoElementsArray(): void
    {
        $this->givenTwoElementsTypeIndependentVariableArray();
        $this->thenReturnTwoElementsArray();
    }

    private function givenTwoElementsTypeIndependentVariableArray(): void
    {
        $this->createTypeIndependentVariable();

        $this->typeIndependentVariable2->method('getId')->willReturn(2);
        $this->typeIndependentVariable2->method('getName')->willReturn('Independent Variable 2');

        $this->readAllTypeIndependentVariableResponse = new ReadAllTypeIndependentVariableResponse([
            $this->typeIndependentVariable1,
            $this->typeIndependentVariable2,
        ]);
    }

    private function thenReturnTwoElementsArray(): void
    {
        $this->assertEquals(
            [
                [
                    'id' => 1,
                    'name' =>  'Independent Variable 1',
                ],
                [
                    'id' => 2,
                    'name' =>  'Independent Variable 2',
                ],
            ],
            $this->readAllTypeIndependentVariableResponse->getAllTypeIndependentVariable()
        );
    }

}