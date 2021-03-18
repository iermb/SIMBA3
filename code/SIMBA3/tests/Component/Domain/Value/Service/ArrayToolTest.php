<?php

namespace SIMBA3\Component\Domain\Value\Service;

use PHPUnit\Framework\TestCase;

class ArrayToolTest extends TestCase
{
    private ArrayTool $arrayTool;

    protected function setUp(): void
    {
        $this->arrayTool = new ArrayTool();
    }

    /** @test */
    public function shouldUniqueAssociativeArrayReturnEmptyArrayWhenInputIsEmptyArray(): void
    {
        $input = [];

        $output = [];

        $this->assertEquals($output,$this->arrayTool::uniqueAssociativeArray($input));
    }

    /** @test */
    public function shouldUniqueAssociativeArrayReturnOneElementArrayWhenInputIsOneElementArray(): void
    {
        $input = [
            ['key1' => 1]
        ];

        $output = [
            ['key1' => 1]
        ];

        $this->assertEquals($output,$this->arrayTool::uniqueAssociativeArray($input));
    }

    /** @test */
    public function shouldUniqueAssociativeArrayReturnUniqueAssociativeArray(): void
    {
        $input = [
            ['key1' => 1, 'key2' => 2],
            ['key1' => 1, 'key2' => 2],
            ['key2' => 2, 'key3' => 3],
            ['key2' => 2, 'key3' => 3],
        ];

        $output = [
            ['key1' => 1, 'key2' => 2],
            ['key2' => 2, 'key3' => 3],
        ];

        $this->assertEquals(
            $output,
            $this->arrayTool::uniqueAssociativeArray($input)
        );

    }
}