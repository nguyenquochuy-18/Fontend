<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Product extends Model
{
    protected $table = 'products';
    protected $guarded = [''];
    const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 0;

    const HOT_ON = 1;
    const HOT_OFF = 0;
    protected $status =[
        1 => [
            'name' => 'Kích hoạt',
            'class'=>'label-success'
        ],
        0 => [
            'name' => 'Khóa',
            'class'=>'label-danger'
        ]
    ];

    protected $hot =[
        1 => [
            'name' => 'Có',
            'class'=>'label-success'
        ],
        0 => [
            'name' => 'Không',
            'class'=>'label-danger'
        ]
    ];
    public function getStatus()
    {
        return Arr::get($this->status, $this->pro_active,'[N/A]');
    }
    public function getHot()
    {
        return Arr::get($this->hot, $this->pro_hot,'[N/A]');
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'pro_category_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'ra_user_id');
    }
}
