<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order_detail extends Model
{
    use HasFactory;
    protected $table ='order_details';
    protected $fillable = ['order_id', 'product_id', 'unit_price', 'quantity', 'amount', 'discount'];

    public function product():BelongsTo {
        return $this->belongsTo(products::class, 'product_id');
    }

    public function order(){
        return $this-> belongsTo('App\Models\Order');
    }
}
