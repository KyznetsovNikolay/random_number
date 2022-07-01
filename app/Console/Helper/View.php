<?php

namespace App\Console\Helper;

use Symfony\Component\Console\Helper\Table;
use Illuminate\Console\OutputStyle;

class View
{
    /**
     * @var OutputStyle
     */
    private $output;

    public function setOutput(OutputStyle $output)
    {
        $this->output = $output;
    }

    /**
     * @param array $data
     * @param bool $error
     */
    public function getTableData(array $data, bool $error = false)
    {
        $table = new Table($this->output);

        if (!$error) {
            $table->setHeaders([
                'Id', 'Random number'
            ]);
        } else {
            $table->setHeaders([
                'Id', 'Error Message'
            ]);
        }

        $key = array_keys($data)[0];
        $value = array_values($data)[0];

        $row = $error ? [$key, "<error>$value<error>"] : [$key, $value];

        $table->setRows([
            $row
        ]);

        $table->render();
    }
}
