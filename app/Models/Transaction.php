<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Transaction extends Model
{
//  protected $table = 'transactions';
//  protected $guarded = ['*'];

    protected $fillable = [
        'tr_user_id',
        'tr_total',
        'tr_note',
        'tr_address',
        'tr_phone'
    ];

    const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 0;
    protected $status =[
        1 => [
            'name' => 'Đã xử lý',
            'class'=>'label-success'
        ],
        0 => [
            'name' => 'Chưa xử lý',
            'class'=>'label-danger'
        ]
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'tr_user_id');
    }
    public function getStatus()
    {
        return Arr::get($this->status, $this->tr_status ,'[N/A]');
    }
}
