<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Region;
use App\Models\State;

class Distributor extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function state(){
        return $this->belongsTo(State::class,'state_id','id');
    }

    public function region(){
        return $this->belongsTo(Region::class,'region_id','id');
    }
}
