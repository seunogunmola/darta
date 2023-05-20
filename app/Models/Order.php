<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public static function getRetailerOrders($retailer_id){
        return Self::where('retailer_id',$retailer_id)->get();
    }

    public function orderDetails(){
        return $this->hasMany(OrderDetail::class,'order_id','id');
    }

    public function retailer(){
        return $this->belongsTo(User::class);
    }    
}
