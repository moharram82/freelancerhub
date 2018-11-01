<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $table = 'contracts';

    public static function exists($contract_id) {
        return self::find($contract_id) ?? false;
    }

    public function proposal()
    {
        return $this->belongsTo('App\Models\Proposal');
    }

    public function scopeCompleted(Builder $query)
    {
        return $query->where('is_completed', 1);
    }
}