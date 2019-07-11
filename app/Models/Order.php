<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['transaction_id', 'product_id', 'quantity', 'price', 'price_sale'];

    /**
     * 1 đơn hàng thuộc về sản phẩm
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    /**
     * 1 đơn hàng thuộc về giao dịch
     */
    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }
}
