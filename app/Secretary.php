<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Secretary extends Model
{
    protected $table = 'secretaries';
    public $timestamps = false;
    protected $fillable = [
        'salary','qualification','staff_id','doctor_id'
    ];
}
