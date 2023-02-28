<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Category extends Model
{
    protected $table = 'categories';
    protected $guarded = [''];

    const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 0;
    const HOME = 1;
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
    protected $home =[
        1 => [
            'name' => 'Kích hoạt',
            'class'=>'label-success'
        ],
        0 => [
            'name' => 'Khóa',
            'class'=>'label-danger'
        ]
    ];
    public function getStatus()
    {
        return Arr::get($this->status, $this->c_active,'[N/A]');
    }
    public function getHome()
    {
        return Arr::get($this->home, $this->c_home,'[N/A]');
    }
    public function products()
    {
        return $this->hasMany(Product::class,'pro_category_id');
    }
}
