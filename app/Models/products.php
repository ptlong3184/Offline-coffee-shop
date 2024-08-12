<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = ['product_name','description','type','price','alert_stock','quantity'];

    public function orderdetail(){
        return $this-> hasMany('App\Models\Order_detail');
    }
}
