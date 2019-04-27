<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detection extends Model
{
    protected $table = 'detections';
    protected $fillable = [
         'observation','finish','send','pull','0','price','prescription','doctor_id','patient_id','detection_id','created_at','updated_at'
    ];
}
