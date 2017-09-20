<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class letter2send extends Model
{
    public $timestamps = false;

    public function contact() {
        return $this->hasOne('App\Contacts');
    }
}
