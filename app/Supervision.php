<?php

namespace App;
use App\Typology;
use Illuminate\Database\Eloquent\Model;

class Supervision extends Model
{
    protected $fillable=["name","phone","extension"];

    public function typologies(){
    	$this->belongsToMany(Typology::class)->withTimestamps();
    }
}
