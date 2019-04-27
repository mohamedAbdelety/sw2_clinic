<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exchange extends Model
{
    protected $table = 'exchanges';
     public $timestamps = false;
    protected $fillable = [
      'name','value','type','peroid_type','category','day','month','year'
    ];
}
