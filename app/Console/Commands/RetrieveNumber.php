<?php

namespace App\Console\Commands;

use App\Console\Helper\View;
use App\Module\Exception\NotFoundModelException;
use App\Module\Number\UseCase\Retrieve\Handler;
use Illuminate\Console\Command;
use App\Module\Number\UseCase\Retrieve\Command as DTO;

class RetrieveNumber extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'number:retrieve {id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retrieve random number for input id';

    /**
     * @var Handler
     */
    private Handler $handler;

    /**
     * @var View
     */
    private View $viewHelper;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Handler $handler, View $viewHelper)
    {
        parent::__construct();
        $this->handler = $handler;
        $this->viewHelper = $viewHelper;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $id = $this->argument('id');
            $command = new DTO($id);
            $this->viewHelper->setOutput($this->output);
            $result = $this->handler->handle($command);

            $this->viewHelper->getTableData($result);

        } catch (NotFoundModelException $e) {
            $result = [$id => $e->getMessage()];
            $this->viewHelper->getTableData($result, true);
        }

        return 0;
    }


}
