<?php

namespace App;

use App\Request as Petition;
use App\Sector;
use App\Traits\SimpleSearchableTables;
use App\Typology;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use McCool\LaravelAutoPresenter\HasPresenter;
use App\Presenters\BrigadePresenter;


class Brigade extends Model implements HasPresenter {

	use SimpleSearchableTables;

	protected $fillable=['name','description'];

	protected $searchable=['name','description'];
	
	public function requests() 
	{
		return $this->hasMany(Petition::class);
	}

	public function typologies()
	{
		return $this->belongsToMany(Typology::class)->withTimestamps();
	}

	public function syncTypologies($typologies)
    {
        return $this->typologies()->sync($typologies ?: []);
    }

    public function getTypologiesListAttribute()
    {
        return $this->typologies->pluck('id')->toArray();
    }

    public function sectors() 
    {	
		return $this->belongsToMany(Sector::class)->withTimestamps();
	}

	public function syncSectors($sectors)
    {
        return $this->sectors()->sync($sectors ?: []);
    }

	public function getSectorsListAttribute()
    {
        return $this->sectors->pluck('id')->toArray();
    }

    public function getPresenterClass()
    {
        return BrigadePresenter::class;
    }
}