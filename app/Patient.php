<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'patients';
    protected $fillable = [
         'name','gender','address','job','age','mobile','created_at','updated_at'
    ];
}
