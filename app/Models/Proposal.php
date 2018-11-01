<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    protected $table = 'proposals';

    public static function exists($proposal_id) {
        return self::find($proposal_id) ?? false;
    }

    public function contract()
    {
        return $this->hasOne('App\Models\Contract');
    }

    public function freelancer()
    {
        return $this->belongsTo('App\Models\Freelancer');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }
}