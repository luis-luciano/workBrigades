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
    

    protected $fillable=['name','phone','extension','user_id', 'supervision_id'];

    protected $searchable=['name'];

    public function typologies()
    {
    	$this->belongsToMany(Typology::class)->withTimestamps();
    }

    public function requests()
    {
    	return $this->belongsToMany('App\Request')->withTimestamps();
    }

    public function manager()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * A supervision may be given various members.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function members()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function getMembersListAttribute()
    {
        return $this->members->lists('id')->toArray();
    }

    public function syncMembers($members)
    {
        return $this->members()->sync($members ?: []);
    }
}