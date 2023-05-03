<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class State extends Pivot
{
    public static function getStates(){
        $states = [
            '1'=>'Lagos',
            '2'=>'Ibadan'
        ];
        return $states;
    }
}
