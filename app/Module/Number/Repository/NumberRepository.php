<?php

namespace App\Module\Number\Repository;

use App\Module\Number\Model\Number;

class NumberRepository
{
    /**
     * @param int $id
     * @return Number|null
     */
    public function findById(int $id): ?Number
    {
        return Number::find($id);
    }

    /**
     * @param $randomNumber
     * @return Number
     */
    public function create($randomNumber): Number
    {
        $number = new Number();
        $number->number = $randomNumber;
        $number->save();

        return $number;
    }
}
