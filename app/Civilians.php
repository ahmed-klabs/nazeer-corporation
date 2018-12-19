<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Civilians extends Model
{
    public function country()
    {
        return $this->belongsTo(Countries::class);
    }
}
