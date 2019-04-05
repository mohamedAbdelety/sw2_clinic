<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = "settings";
 	protected $fillable = [
        'sitename', 'logo','main_lang','description','keywords','status','message_maintance_frontend','message_maintance_backend','facebook','twitter','instgram','location','phone'
    ];
}
