<?php

namespace App;

use App\Brigade;
use App\Citizen;
use App\Colony;
use App\RequestPriority;
use App\RequestState;
use App\RequestType;
use App\Sector;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Request extends Model {
	//
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
						'brigade_id'
					   ];

	public function concerned()
	{
		return $this->morphTo();
	}

	public function creator()
	{
		return $this->morphTo();
	}

	public function state() 
	{
		return $this->belongsTo(RequestState::class);
	}

	public function priority() {
		return $this->belongsTo(RequestPriority::class);
	}

	public function sector() {
		return $this->belongsTo(Sector::class);
	}

	public function brigade() {
		return $this->belongsTo(Brigade::class);
	}

	public function colony() {
		return $this->belongsTo(Colony::class);
	}

	public function problem() 
	{
		return $this->belongsTo('App\Problem');
	}

	public function citizen() {
		return $this->belongsTo(Citizen::class);
	}

	public function users() 
	{
		return $this->belongsToMany(User::class);
	}
	
	public function captureType()
	{
		return $this->belongsTo('App\CaptureType');
	}

	public function type()
	{
		return $this->belongsTo('App\RequestType');
	}
}