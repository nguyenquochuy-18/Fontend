<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Article extends Model
{
    protected $table = 'articles';
    protected $guarded = [''];
    const HOT = 1;
    protected $status =[
        1 => [
            'name' => 'Kích hoạt',
            'class'=>'label-success'
        ],
        0 => [
            'name' => 'khóa',
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
        return Arr::get($this->status, $this->a_active,'[N/A]');
    }
    public function getHot()
    {
        return Arr::get($this->hot, $this->c_hot,'[N/A]');
    }
}
