<?php

namespace App;

use App\ProblemType;
use Illuminate\Database\Eloquent\Model;

class Typology extends Model
{
    public function Typologies() {
		return $this->hasMany(ProblemType::class);
	}
}
