<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Secretary extends Model
{
    protected $table = 'secretaries';
    protected $fillable = [
        'salary','qualification','staff_id','doctor_id'
    ];
}
