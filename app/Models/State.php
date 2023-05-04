<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public static function getStates(){
        $states = [
            '1'=>'Lagos',
            '2'=>'Ibadan'
        ];
        return $states;
    }

    public static function getAllStates(){
        $states =  State::all()->sortBy('state_name');
        return $states;    
    }

    public static function getStateWithUniqueid($uniqueid){
        $state = State::where(['uniqueid'=>$uniqueid])->first();
        return $state;
    }
}
