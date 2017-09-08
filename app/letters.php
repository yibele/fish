<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class letters extends Model
{
    protected $primaryKey = 'lid';

    public function user() {
        return $this->belongsTo('App\User');
    }


}
