<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    public static function exists($city_id) {
        return self::find($city_id) ?? false;
    }

    public function freelancers()
    {
        return $this->hasMany('App\Models\Freelancer');
    }

    public function customers()
    {
        return $this->hasMany('App\Models\Customer');
    }
}