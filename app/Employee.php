<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
    protected $fillable = [
        'name','mobile','address','salary','weekend','title','gender','birthDate','start_at','end_at','created_at','updated_at'
    ];
}
