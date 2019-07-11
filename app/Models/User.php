<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $guarded = ['*'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'avatar', 'password', 'active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

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
