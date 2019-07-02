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

    const STATUS_PUBLIC  = 1;
    const STATUS_PRIVATE = 0;
    const HOT_ON = 1;
    const HOT_OFF = 0;
    protected $status = [
        1 => [
            'name'  => 'Hiển thị',
            'class' => 'label-success',
        ],
        0 => [
            'name'  => 'Ẩn',
            'class' => 'label-default'
        ]
    ];
    protected $is_hot = [
        1 => [
            'name'  => 'Nổi bật',
            'class' => 'label-success',
        ],
        0 => [
            'name'  => 'Không',
            'class' => 'label-default'
        ]
    ];

    /**
     * Hiển thị trạng thái
     **/
    public function getStatus()
    {
        return array_get($this->status, $this->active, '[N\A]');
    }

    /**
     * Hiển thị sản phẩm hot
     **/
    public function getHot()
    {
        return array_get($this->is_hot, $this->hot, '[N\A]');
    }

    /**
     * category_id là khóa ngoại của product
     **/
    public function category()
    {
        return $this->belongsTo(AdminCategory::class, 'category_id');
    }
}
