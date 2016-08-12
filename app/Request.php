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
use Illuminate\Database\Eloquent\Model;

class Request extends Model {

	public static $diskName= 'requests_files';

	public static $uploadsPath= 'uploads/requests_files';
	
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

	public function getTypologyIdAttribute()
	{
		return $this->problem->typology->id;
	}
	
	public function getHasFilesAttribute()
    {
        return $this->files->count() > 0;
    }

	public function getSupervisionsNameAttribute()
	{
		return $this->supervisions->implode('name',',  ');
	}

	public function getProblemsListAttribute()
	{
		return $this->problem->typology->problems->lists('name','id');
	}
	
	public function changeStateTo($state)
    {
        return $this->state()->associate(
            RequestState::whereName($state)->firstOrFail()
        )->save();
    }

	public function scopeCountTypology($query,$id)
    {
        return  $query->whereHas('problem.typology',function($q) use($id)
	    		{ 
	    			$q->where('id','=',$id); 
	    		});
    }
}