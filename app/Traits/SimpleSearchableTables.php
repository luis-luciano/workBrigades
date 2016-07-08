<?php

namespace App\Traits;

use App\Traits\SearchableTrait;
use Illuminate\Database\Eloquent\Builder;

trait SimpleSearchableTables
{
    use SearchableTrait;

    public function scopePaginateForTable(Builder $query)
    {
        $limit = request()->get('limit', 10);
        $q = request()->get('q', '');

        $paginator = $query->paginate($limit);
        $paginator->appends(['limit' => $limit, 'q' => $q]);

        return $paginator;
    }
}
