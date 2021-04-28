<?php

namespace Component\Domain\Variable\Service;

use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Domain\Variable\Entity\Month;
use SIMBA3\Component\Domain\Variable\Service\TermDictionary;

class TermDictionaryTest extends TestCase
{
    private TermDictionary $termDictionary;
    private Month          $month1;
    private Month          $month2;

    /** @test */
    public function shouldTermDictionaryReturnEmptyArrayWhenDoesntExistsTerms(): void
    {
        $this->givenATermDictionaryWithoutTerms();
        $this->thenReturnEmptyArray();
    }

    private function givenATermDictionaryWithoutTerms(): void
    {
        $this->termDictionary = new TermDictionary([]);
    }

    private function thenReturnEmptyArray(): void
    {
        $this->assertEquals([], $this->termDictionary->getDictionaryValuesAsArray());
    }

    /** @test */
    public function shouldTermDictionaryReturnOneTermAsArrayWhenThereIsOneTerm(): void
    {
        $this->givenATermDictionaryWithOneElement();
        $this->thenReturnArrayWithOneElement();
    }

    private function givenATermDictionaryWithOneElement(): void
    {
        $this->termDictionary = new TermDictionary([$this->month1]);
    }

    private function thenReturnArrayWithOneElement(): void
    {
        $this->assertEquals([['termId' => 1, 'termName' => 'name1']],
            $this->termDictionary->getDictionaryValuesAsArray());
    }

    /** @test */
    public function shouldTermDictionaryReturnTwoTermAsArrayWhenThereAreTwoTerms(): void
    {
        $this->givenATermDictionaryWithTwoElements();
        $this->thenReturnArrayWithTwoElements();
    }

    private function givenATermDictionaryWithTwoElements(): void
    {
        $this->termDictionary = new TermDictionary([$this->month1, $this->month2]);
    }

    private function thenReturnArrayWithTwoElements(): void
    {
        $this->assertEquals([['termId' => 1, 'termName' => 'name1'], ['termId' => 2, 'termName' => 'name2']],
            $this->termDictionary->getDictionaryValuesAsArray());
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->month1 = $this->createMock(Month::class);
        $this->month2 = $this->createMock(Month::class);
        $this->month1->method('getId')->willReturn(1);
        $this->month1->method('getMonth')->willReturn('name1');
        $this->month2->method('getId')->willReturn(2);
        $this->month2->method('getMonth')->willReturn('name2');
    }

}
