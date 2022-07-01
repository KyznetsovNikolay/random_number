<?php

namespace App\Http\Controllers\Number;

use App\Http\Controllers\Controller;
use App\Module\Exception\NotFoundModelException;
use App\Module\Number\UseCase\Retrieve\Command;
use App\Module\Number\UseCase\Retrieve\Handler;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class RetrieveAction extends Controller
{
    /**
     * @var Handler
     */
    private Handler $handler;

    public function __construct(Handler $handler)
    {
        $this->handler = $handler;
    }

    public function __invoke(int $id): Response
    {
        try {
            $command = new Command($id);
            $response = $this->handler->handle($command);
        } catch (NotFoundModelException $e) {
            return new JsonResponse(['error' => $e->getMessage()]);
        }

        return new JsonResponse($response);
    }
}
