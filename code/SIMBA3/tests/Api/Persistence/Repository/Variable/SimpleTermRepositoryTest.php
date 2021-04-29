<?php

namespace SIMBA3\Api\Persistence\Repository\Variable;

use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Domain\Variable\Entity\Month;

class SimpleTermRepositoryTest extends TestCase
{
    private SimpleTermRepository $simpleTermRepository;

    /** @test */
    public function shouldSimpleTermRepositoryReturnNullElements()
    {
        $this->givenSimpleTermRepository();
        $this->thenReturnNullWhenIncorrectTermId();
    }

    /** @test */
    public function shouldSimpleTermRepositoryReturnMonthElements()
    {
        $this->givenSimpleTermRepository();
        $this->thenReturnMonths();
    }

    private function givenSimpleTermRepository()
    {
        $this->simpleTermRepository = new SimpleTermRepository();
    }

    private function thenReturnMonths()
    {
        $this->assertEquals(
            new Month(1, '1er trimestre'),
            $this->simpleTermRepository->getMonth('ca',1)
        );

        $this->assertEquals(
            new Month(4, '4o trimestre'),
            $this->simpleTermRepository->getMonth('es',4)
        );

        $this->assertEquals(
            [
                new Month(2,'2nd term'),
                new Month(3,'3rd term'),
                new Month(4,'4th term'),
            ],
            $this->simpleTermRepository->getMonthsByFilter('en',
                [
                    ['monthId' => 2],
                    ['monthId' => 3],
                    ['monthId' => 4],
                ]
            )
        );
    }

    private function thenReturnNullWhenIncorrectTermId()
    {
        $this->assertEquals(
            null,
            $this->simpleTermRepository->getMonth('it',1)
        );

        $this->assertEquals(
            null,
            $this->simpleTermRepository->getMonth('ca',5)
        );
    }
}