<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function getRegions(){
        return Region::all()->sortBy('region_name');
    }

    public static function getRegionWithUniqueid($uniqueid){
        return Region::where('uniqueid',$uniqueid)->first();
    }

    public function state()
    {
        return $this->belongsTo(State::class,'state_id','id');
    }
}
