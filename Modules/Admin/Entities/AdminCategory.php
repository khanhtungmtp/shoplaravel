<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;

class AdminCategory extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name', 'slug' , 'icon', 'avatar', 'active', 'title_seo', 'description_seo', 'keyword_seo', 'total_product'];
    protected $guarded  = [];

    const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 0;
    protected $status = [
        1 => [
            'name' => 'Hiển thị',
            'class' => '',
        ],
        0 => [
            'name' => 'Không hiển thị',
            'class' => ''
        ]
    ];

    public function getStatus()
    {
        return array_get($this->status, $this->active, '[N\A]');
    }
}
