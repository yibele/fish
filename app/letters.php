<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class letters extends Model
{
    protected $primaryKey = 'id';

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function comment() {
        return $this->hasMany('App\pubLetterComment');
    }

    public function letter2send () {
        return $this->hasMany('App\letter2send');
    }
}
