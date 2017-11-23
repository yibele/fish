<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Yincai;

class Xinzhi extends Model
{
	public function yincai() {
		return $this->belongsTo('App\Yincai');
	}
}
