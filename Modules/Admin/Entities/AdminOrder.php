<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;

class AdminOrder extends Model
{
    protected $table = 'orders';
    protected $fillable = ['transaction_id', 'product_id', 'quantity', 'price', 'price_sale'];

    /**
     * 1 đơn hàng thuộc về sản phẩm
    */
    public function product()
    {
        return $this->belongsTo(AdminProduct::class, 'product_id');
    }

    /**
     * 1 đơn hàng thuộc về giao dịch
     */
    public function transaction()
    {
        return $this->belongsTo(AdminTransaction::class, 'transaction_id');
    }
}
