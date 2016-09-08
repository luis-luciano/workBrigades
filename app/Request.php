<?php

namespace App;

use App\Brigade;
use App\Citizen;
use App\Colony;
use App\RequestPriority;
use App\RequestType;
use App\Sector;
use App\User;
use App\RequestState;
use McCool\LaravelAutoPresenter\HasPresenter;
use App\Presenters\RequestPresenter;
use App\Traits\SimpleSearchableTables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 
use Carbon\Carbon;

class Request extends Model implements HasPresenter
{

	use SoftDeletes, SimpleSearchableTables; 

	/**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at']; 
	
	protected $fillable=[
						'subject',
						'start_date',
						'finish_date',
						'street',
						'number',
						'between_streets',
						'reference',
						'colony_id',
						'request_priority_id',
						'problem_id',
						'brigade_id',
						'request_state_id',
						'request_rejection_id'
					   ];

	public static $diskName= 'requests_files';

	public static $uploadsPath= 'uploads/requests_files';

	public static function boot()
    {
        parent::boot();

        static::creating(function ($request) {
            $request->pin = (string) mt_rand(10000, 99999);
        });
    }

    public function scopeSearch(Builder $query, $search)
    {
        $relationsToLoad = ['supervisions', 'state', 'concerned'];
        $query->with($relationsToLoad);
        //$search['date_range'] = $search['date_range'] ? getDateRange($search['date_range']) : "";
        //
        $citizenIdsCandidates = function () use ($search) {
            return array_map(function ($citizen) {
                return $citizen['id'];
            }, Search::citizensByNames($search['citizen']));
        };

        $query->where(function ($query) use ($search, $citizenIdsCandidates) {
        	if (!empty($search['id'])) {
                $query->where('id', $search['id']);
            }

            if (!empty($search['citizen'])) {
                $query->whereIn('concerned_id', $citizenIdsCandidates($search));
            }

            if (!empty($search['states'])) {
                $query->whereIn('request_state_id', $search['states']);
            }

            // look for requests that has supervisions and match the constraint
            if (!empty($search['supervisions'])) {
                $query->whereHas('supervisions', function ($query) use ($search) {
                    $query->whereIn('id', $search['supervisions']);
                });
            }
        })
            ->with($relationsToLoad)
            ->orderBy('created_at', 'desc');

        return $query;
    }

	public function concerned()
	{
		return $this->morphTo();
	}

	public function creator()
	{
		return $this->morphTo();
	}

	public function files()
    {
        return $this->morphMany('App\File', 'filable');
    }

    public function location()
    {
        return $this->belongsTo('App\RequestLocation', 'request_location_id');
    }

    public function addFile($file)
    {
        return $this->files()->save($file);
    }

	public function state() 
	{
		return $this->belongsTo('App\RequestState','request_state_id');
	}

	public function priority() 
	{
		return $this->belongsTo('App\RequestPriority','request_priority_id');
	}

	public function brigade() 
	{
		return $this->belongsTo(Brigade::class,'brigade_id');
	}

	public function colony() 
	{
		return $this->belongsTo(Colony::class);
	}

	public function problem() 
	{
		return $this->belongsTo('App\Problem');
	}

	public function citizen() 
	{
		return $this->belongsTo(Citizen::class);
	}

	public function users() 
	{
		return $this->belongsToMany(User::class);
	}

	public function usersReplies() 
	{
		return $this->belongsToMany(User::class);
	}
	
	public function captureType()
	{
		return $this->belongsTo('App\CaptureType');
	}

	public function type()
	{
		return $this->belongsTo('App\RequestType','request_type_id');
	}

	public function supervisions()
	{
		return $this->belongsToMany('App\Supervision')->withTimestamps();
	}

	public function rejection()
	{
		return $this->belongsTo('App\RequestRejection','request_rejection_id');
	}

	public function getSectorAttribute()
	{
		return $this->colony->sector;
	}

	public function getCitizenIdAttribute()
	{
		return $this->concerned->id;
	}

	public function getSectorIdAttribute()
	{
		return $this->colony->sector->id;
	}

	public function getSectorNumberAttribute()
	{
		return $this->colony->sector->number;
	}

	public function getBrigadeNameAttribute()
	{
		return $this->brigade->name;
	}

	public function getTypologyIdAttribute()
	{
		return $this->problem->typology->id;
	}
	
	public function getHasFilesAttribute()
    {
        return $this->files->count() > 0;
    }

    public function getHasLocationAttribute()
    {
        return !is_null($this->location);
    }

	public function getSupervisionsNameAttribute()
	{
		return $this->supervisions->implode('name',',  ');
	}

	public function getProblemsListAttribute()
	{
		return $this->problem->typology->problems->lists('name','id');
	}

	public function getDateCreatedShortAttribute()
	{
		return Carbon::parse($this->created_at)->toDateString();
	}
	
	public function changeStateTo($state)
    {
        return $this->state()->associate(
            RequestState::whereName($state)->firstOrFail()
        )->save();
    }

    public function getSupervisionsListAttribute()
    {
        return $this->supervisions->implode('name', ',');
    }

	public function scopeCountTypology($query,$id)
    {
        return  $query->whereHas('problem.typology',function($q) use($id)
	    		{ 
	    			$q->where('id','=',$id); 
	    		});
    }

    public function getStateLabelAttribute()
	{
		return RequestState::findOrFail($this->request_state_id)->label;
	}

	public function getPresenterClass()
    {
        return RequestPresenter::class;
    }
}