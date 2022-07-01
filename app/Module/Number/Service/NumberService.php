<?php

namespace App\Module\Number\Service;

class NumberService
{
    public function generate(): int
    {
        return rand(1, 1000000);
    }
}
