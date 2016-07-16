<?php

namespace App;
use App\Typology;
use Illuminate\Database\Eloquent\Model;
use App\Traits\SimpleSearchableTables;
use Illuminate\Database\Eloquent\Builder;

class Supervision extends Model
{
	use SimpleSearchableTables;

    protected $fillable=["name","phone","extension"];

    protected $searchable=['name'];

    public function typologies(){
    	$this->belongsToMany(Typology::class)->withTimestamps();
    }
}
