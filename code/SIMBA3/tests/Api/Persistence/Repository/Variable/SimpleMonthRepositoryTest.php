<?php

namespace SIMBA3\Api\Persistence\Repository\Variable;

use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Domain\Variable\Entity\Month;

class SimpleMonthRepositoryTest extends TestCase
{
    private SimpleMonthRepository $simpleMonthRepository;

    /** @test */
    public function shouldIncorrectMonthRetrieveReturnNullElement()
    {
        $this->givenSimpleMonthRepository();
        $this->thenReturnNullElementWhenRetrieveIncorrectMonth();
    }

    private function givenSimpleMonthRepository()
    {
        $this->simpleMonthRepository = new SimpleMonthRepository();
    }

    private function thenReturnNullElementWhenRetrieveIncorrectMonth()
    {
        $this->assertEquals(null,$this->simpleMonthRepository->getMonth('kr', 1));
        $this->assertEquals(null,$this->simpleMonthRepository->getMonth('es', 13));
    }

    /** @test */
    public function shouldSimpleMonthRepositoryReturnMonths()
    {
        $this->givenSimpleMonthRepository();
        $this->thenReturnMonths();
    }

    private function thenReturnMonths()
    {
        $this->assertEquals(
            new Month(1,'Gener'),
            $this->simpleMonthRepository->getMonth('ca', 1)
        );

        $this->assertEquals(
            new Month(12,'Diciembre'),
            $this->simpleMonthRepository->getMonth('es', 12)
        );

        $this->assertEquals(
            new Month(3,'March'),
            $this->simpleMonthRepository->getMonth('en', 3)
        );

        $this->assertEquals(
            [
                new Month(2,'Febrer'),
                new Month(9,'Setembre'),
                new Month(5,'Maig'),
            ],
            $this->simpleMonthRepository->getMonthsByFilter(
                'ca',
                [
                    ['monthId' => 2],
                    ['monthId' => 9],
                    ['monthId' => 5],
                ]
            )
        );
    }
}