<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;

class AdminTransaction extends Model
{
    protected $table = 'transactions';
    protected $fillable = ['id', 'user_id', 'phone', 'address', 'note', 'total', 'status'];
}
