<?php

namespace SIMBA3\Component\Domain\Variable\Service;

use SIMBA3\Component\Domain\Variable\Entity\Month;

class TermDictionary implements TypeDictionary
{
    private const TERM_ID_FIELD = "termId";
    private const TERM_NAME_FIELD = "termName";

    private array $terms;

    public function __construct(array $terms)
    {
        $this->terms = $terms;
    }


    public function getDictionaryValuesAsArray(): array
    {
        return array_map(array($this, "getTermAsArray"), $this->terms);
    }

    private function getTermAsArray(Month $month): array
    {
        return [
            self::TERM_ID_FIELD => $month->getId(),
            self::TERM_NAME_FIELD => $month->getMonth()
        ];
    }
}