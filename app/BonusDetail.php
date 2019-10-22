<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BonusDetail extends Model
{
    protected $table = 'bouns_details';

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
