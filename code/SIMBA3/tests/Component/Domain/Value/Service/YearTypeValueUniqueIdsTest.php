<?php

namespace Component\Domain\Value\Service;

use PHPUnit\Framework\TestCase;
use SIMBA3\Component\Domain\Value\Entity\YearValue;
use SIMBA3\Component\Domain\Value\Service\TypeValueArray;
use SIMBA3\Component\Domain\Value\Service\YearTypeValueUniqueIds;

class YearTypeValueUniqueIdsTest extends TestCase
{
    private YearTypeValueUniqueIds $yearTypeValueUniqueIds;
    private TypeValueArray         $typeValueArray;
    private YearValue              $yearValue1;
    private YearValue              $yearValue2;
    private YearValue              $yearValue3;

    /** @test */
    public function shouldYearTypeValueUniqueIdsReturnUniqueYearsIds(): void
    {
        $this->givenAnYearTypeValueUniqueIds();
        $this->thenReturnArrayWithUniqueYearsIds();
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->typeValueArray = $this->createMock(TypeValueArray::class);
        $this->yearValue1 = $this->createMock(YearValue::class);
        $this->yearValue2 = $this->createMock(YearValue::class);
        $this->yearValue3 = $this->createMock(YearValue::class);
    }

    private function givenAnYearTypeValueUniqueIds(): void
    {
        $this->yearTypeValueUniqueIds = new YearTypeValueUniqueIds($this->typeValueArray);
        $this->yearValue1->method("getYear")->willReturn(2018);
        $this->yearValue2->method("getYear")->willReturn(2019);
        $this->yearValue3->method("getYear")->willReturn(2018);
        $this->typeValueArray->method("getValues")->willReturn([
            $this->yearValue1,
            $this->yearValue2,
            $this->yearValue3
        ]);
    }

    private function thenReturnArrayWithUniqueYearsIds(): void
    {
        $this->assertEquals([2018, 2019], $this->yearTypeValueUniqueIds->getYearUniqueIds());
    }
}
