<?php

namespace App;
use App\Typology;
use Illuminate\Database\Eloquent\Model;
use App\Traits\SimpleSearchableTables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;


class Supervision extends Model
{
	use SimpleSearchableTables, SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    

    protected $fillable=["name","phone","extension"];

    protected $searchable=['name'];

    public function typologies()
    {
    	$this->belongsToMany(Typology::class)->withTimestamps();
    }

    public function requests()
    {
    	return $this->belongsToMany('App\Request')->withTimestamps();
    }
}