<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $fillable = ['address','name','phone','user_id','created_at','updated_at'];

    protected $guarded = ['id'];

    public function user() {
        return $this->belongsTo('App\Users');
    }
}
