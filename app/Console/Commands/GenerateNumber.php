<?php

namespace App\Console\Commands;

use App\Console\Helper\View;
use App\Module\Number\UseCase\Generate\Handler;
use Illuminate\Console\Command;

class GenerateNumber extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'number:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate new random number';

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
     * @return int
     */
    public function handle()
    {
        $result = $this->handler->handle();
        $this->viewHelper->setOutput($this->output);
        $this->viewHelper->getTableData($result);

        return 0;
    }
}
