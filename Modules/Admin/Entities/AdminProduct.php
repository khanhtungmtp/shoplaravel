<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;

class AdminProduct extends Model
{
    protected $table    = 'products';
    protected $fillable = [
        'name', 'slug', 'description', 'content', 'category_id', 'price', 'price_sale',
        'author_id', 'avatar', 'active', 'hot', 'view', 'title_seo', 'keyword_seo'];
    protected $guarded  = [''];
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
