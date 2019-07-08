<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;

class AdminOrder extends Model
{
    protected $table = 'orders';
    protected $fillable = ['transaction_id', 'product_id', 'quantity', 'price', 'price_sale'];
}
