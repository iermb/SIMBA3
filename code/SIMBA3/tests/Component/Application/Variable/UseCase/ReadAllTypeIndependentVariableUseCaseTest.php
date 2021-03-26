<?php


namespace SIMBA3\Component\Application\Variable\UseCase;


use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Application\Variable\Request\ReadAllTypeIndependentVariableRequest;
use SIMBA3\Component\Application\Variable\Response\ReadAllTypeIndependentVariableResponse;
use SIMBA3\Component\Domain\Variable\Repository\TypeIndependentVariableRepository;

class ReadAllTypeIndependentVariableUseCaseTest extends TestCase
{
    private ReadAllTypeIndependentVariableUseCase $readAllTypeIndependentVariableUseCase;
    private TypeIndependentVariableRepository $typeIndependentVariableRepository;
    private ReadAllTypeIndependentVariableRequest $readAllTypeIndependentVariableRequest;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->typeIndependentVariableRepository = $this->createMock(TypeIndependentVariableRepository::class);
        $this->readAllTypeIndependentVariableRequest = $this->createMock(ReadAllTypeIndependentVariableRequest::class);
    }

    /** @test */
    public function shouldReadAllTypeIndependentVariableUseCaseReturnReadAllTypeIndependentVariableResponse(): void
    {
        $this->givenReadAllTypeIndependentVariableUseCase();
        $this->thenExpectsGetValuesFromRepository();
        $this->thenReturnReadAllTypeIndependentVariableResponse();

    }

    private function givenReadAllTypeIndependentVariableUseCase(): void
    {
        $this->typeIndependentVariableRepository->method('getAllTypeIndependentVariable')->willReturn([]);
        $this->readAllTypeIndependentVariableUseCase = new ReadAllTypeIndependentVariableUseCase($this->typeIndependentVariableRepository);
        $this->readAllTypeIndependentVariableRequest->method('getLocale')->willReturn('es');
    }

    private function thenReturnReadAllTypeIndependentVariableResponse(): void
    {
        $this->assertInstanceOf(
            ReadAllTypeIndependentVariableResponse::class,
            $this->readAllTypeIndependentVariableUseCase->execute($this->readAllTypeIndependentVariableRequest)
        );
    }

    private function thenExpectsGetValuesFromRepository(): void
    {
        $this->typeIndependentVariableRepository->expects($this->once())->method("getAllTypeIndependentVariable");
    }
}