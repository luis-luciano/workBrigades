<?php

namespace App;

use App\Traits\SimpleSearchableTables;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class ReplyType extends Model
{

	use SoftDeletes, SimpleSearchableTables;

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
    protected $fillable = ['label'];

    /**
     * The attributes that are searchable.
     *
     * @var array
     */
    protected $searchable = [
        'label',
    ];
}
