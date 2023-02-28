<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Slider extends Model
{
    use HasFactory;
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
    public function getStatus()
    {
        return Arr::get($this->status, $this->active,'[N/A]');
    }
}
