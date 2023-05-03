<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Region extends Pivot
{
    public static function getRegions(){
        $regions = [
            '1'=>'South West',
            '2'=>'North West'
        ];
        return $regions;
    }
}
