<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RFQ extends Model
{
    protected $table = 'rfqs';

    public static function exists($rfq_id) {
        return self::find($rfq_id) ?? false;
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    public function freelancer()
    {
        return $this->belongsTo('App\Models\Freelancer');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}