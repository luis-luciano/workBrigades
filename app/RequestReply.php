<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequestReply extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reply_type_id',
        'who_last_edited_id',
    ];

    public function request()
    {
        return $this->hasOne('App\Request');
    }

    public function lastEditor()
    {
        return $this->belongsTo('App\User', 'who_last_edited_id');
    }

    public function getLastEditorFullNameAttribute()
    {
        return $this->lastEditor->full_name;
    }
}