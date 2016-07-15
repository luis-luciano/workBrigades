<?php

namespace App;

use App\Problem;
use App\Supervision;
use Illuminate\Database\Eloquent\Model;
use App\Traits\SimpleSearchableTables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use McCool\LaravelAutoPresenter\HasPresenter;
use App\Presenters\TypologyPresenter;

class Typology extends Model implements HasPresenter
{
	use SimpleSearchableTables;

	protected $fillable=['name'];

    public function problems() {
    	
		return $this->hasMany(Problem::class);
	}

	public function supervisions(){
		return $this->belongsToMany(Supervision::class)->withTimestamps();
	}

	 public function getSupervisionsListAttribute()
    {
        return $this->supervisions->pluck('id')->toArray();
    }

	public function syncSupervisions($supervisions)
    {
        return $this->supervisions()->sync($supervisions ?: []);
    }

	public function brigades(){
		return $this->belongsToMany('App\Brigade');
	}

	public function scopeSearch(Builder $query, $search)
    {
        $relationsToLoad = ['supervisions'];
        $query->with($relationsToLoad);

        $query->where(function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%");

            $query->orWhereHas('supervisions', function ($query) use ($search) {
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%");
                });
            });
        })
            ->with($relationsToLoad);

        return $query;
    }
    
    public function getPresenterClass()
    {
        return TypologyPresenter::class;
    }
}