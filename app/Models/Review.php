<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';

    public static function exists($review_id) {
        return self::find($review_id) ?? false;
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