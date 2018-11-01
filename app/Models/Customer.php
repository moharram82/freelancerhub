<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    public static function exists($customer_id) {
        return self::find($customer_id) ?? false;
    }

    public function contracts()
    {
        return $this->hasManyThrough('App\Models\Contract', 'App\Models\Proposal');
    }

    public function proposals()
    {
        return $this->hasMany('App\Models\Proposal');
    }

    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

    public function rfqs()
    {
        return $this->hasMany('App\Models\RFQ');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}