<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Secretary extends Model
{
    protected $table = 'secretaries';
    public $timestamps = false;
    protected $fillable = [
        'salary','qualification','last_month','last_year','month_number','staff_id','doctor_id'
    ];
}
