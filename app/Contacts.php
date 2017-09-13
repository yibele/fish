<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    public function user() {
        return $this->belongsTo('App\Users');
    }
}
