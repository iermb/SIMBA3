<?php

namespace SIMBA3\Api\Persistence\Repository\Variable;

use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Domain\Variable\Entity\Year;

class SimpleYearRepositoryTest extends TestCase
{
    private SimpleYearRepository $simpleYearRepository;

    /** @test */
    public function shouldSimpleYearRepositoryReturnYearElements()
    {
        $this->givenSimpleYearRepository();
        $this->thenReturnYears();
    }

    private function givenSimpleYearRepository()
    {
        $this->simpleYearRepository = new SimpleYearRepository();
    }

    private function thenReturnYears()
    {
        $this->assertEquals(
            new Year(3205),
            $this->simpleYearRepository->getYear(3205)
        );

        $this->assertEquals(
            [
                new Year(2),
                new Year(4567),
                new Year(11),
            ],
            $this->simpleYearRepository->getYearsByFilter(
                [
                    ['yearId' => 2],
                    ['yearId' => 4567],
                    ['yearId' => 11],
                ]
            )
        );
    }
}