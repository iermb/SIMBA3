<?php

namespace SIMBA3\Component\Application\Locale\UseCase;

use SIMBA3\Component\Application\Locale\Request\ReadLocaleRequest;
use SIMBA3\Component\Application\Locale\Response\ReadLocaleResponse;
use SIMBA3\Component\Domain\Locale\Repository\LocaleRepository;

class ReadLocaleUseCase
{
    private LocaleRepository $localeRepository;

    public function __construct(LocaleRepository $localeRepository)
    {
        $this->localeRepository = $localeRepository;
    }

    public function execute(ReadLocaleRequest $readLocaleRequest): ReadLocaleResponse
    {
        return new ReadLocaleResponse(
            $this->localeRepository->getLocale($readLocaleRequest->getNameLocale())
        );
    }
}