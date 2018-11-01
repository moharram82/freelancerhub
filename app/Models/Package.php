<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'packages';

    public static function exists($package_id) {
        return self::find($package_id) ?? false;
    }

    public function freelancer()
    {
        return $this->belongsTo('App\Models\Freelancer');
    }
}