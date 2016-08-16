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
use Illuminate\Database\Eloquent\SoftDeletes;



class Brigade extends Model implements HasPresenter {

	use SimpleSearchableTables, SoftDeletes;
    
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


	protected $fillable=['name','description'];

	protected $searchable=['name','description'];
	
	public function requests() 
	{
		return $this->hasMany(Petition::class);
	}

    public function typologies()
    {
        return $this->belongsToMany('App\Typology','sects_brigs_typs','sector_id','brigade_id','typology_id')->withTimestamps();
    }

    public function sectors()
    {
        return $this->belongsToMany('App\Sector','sects_brigs_typs','sector_id','brigade_id','typology_id')->withTimestamps();
    }

    public function getPresenterClass()
    {
        return BrigadePresenter::class;
    }
}