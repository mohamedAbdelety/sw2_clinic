<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = 'doctors';
    public $timestamps = false;
    protected $fillable = [
        'Dectsalary','experience','position','payedDetections','staff_id','qualification','specail'
    ];
}
