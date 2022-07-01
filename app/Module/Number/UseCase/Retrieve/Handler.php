<?php

namespace App\Module\Number\UseCase\Retrieve;

use App\Module\Exception\NotFoundModelException;
use App\Module\Number\Repository\NumberRepository;
use App\Module\Number\Model\Number;

class Handler
{

    /**
     * @var NumberRepository
     */
    private NumberRepository $numberRepository;

    public function __construct(NumberRepository $numberRepository)
    {
        $this->numberRepository = $numberRepository;
    }

    /**
     * @param Command $command
     * @return array
     */
    public function handle(Command $command): array
    {
        $id = $command->id;

        /** @var Number $number */
        if (!$number = $this->numberRepository->findById($id)) {
            throw new NotFoundModelException(
                sprintf('Record with id = %s does not exists', $id)
            );
        }

        return [
            $id => $number->number
        ];
    }
}
