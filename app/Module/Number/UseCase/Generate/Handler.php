<?php

namespace App\Module\Number\UseCase\Generate;

use App\Module\Number\Repository\NumberRepository;
use App\Module\Number\Service\NumberService;

class Handler
{
    /**
     * @var NumberService
     */
    private NumberService $numberService;

    /**
     * @var NumberRepository
     */
    private NumberRepository $numberRepository;

    public function __construct(NumberService $numberService, NumberRepository $numberRepository)
    {
        $this->numberService = $numberService;
        $this->numberRepository = $numberRepository;
    }

    /**
     * @return array
     */
    public function handle(): array
    {
        $randomNumber = $this->numberService->generate();
        $number = $this->numberRepository->create($randomNumber);

        return [$number->id => $randomNumber];
    }
}
