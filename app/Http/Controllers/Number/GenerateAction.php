<?php

namespace App\Http\Controllers\Number;

use App\Http\Controllers\Controller;
use App\Module\Number\UseCase\Generate\Handler;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class GenerateAction extends Controller
{
    /**
     * @var Handler
     */
    private Handler $handler;

    public function __construct(Handler $handler)
    {
        $this->handler = $handler;
    }

    public function __invoke(): Response
    {
        return new JsonResponse($this->handler->handle());
    }
}
