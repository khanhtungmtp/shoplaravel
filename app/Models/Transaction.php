<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $fillable = ['id', 'user_id', 'phone', 'address', 'note', 'total', 'status'];

    const STATUS_PUBLIC  = 1;
    const STATUS_PRIVATE = 0;
    const HOT_ON = 1;
    const HOT_OFF = 0;
    protected $arr_status = [
        1 => [
            'name'  => 'Đã xử lý',
            'class' => 'label-success',
        ],
        0 => [
            'name'  => 'Chờ xử lý',
            'class' => 'label-default'
        ]
    ];

    /**
     * Hiển thị trạng thái
     **/
    public function getStatus()
    {
        return array_get($this->arr_status, $this->status, '[N\A]');
    }

    /**
     * user_id là khóa ngoại của transaction
     * 1 đơn hàng thuộc 1 user nào đó
     **/
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
