<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $table = 'experiences';

    public static function exists($experience_id) {
        return self::find($experience_id) ?? false;
    }

    public function freelancer()
    {
        return $this->belongsTo('App\Models\Freelancer');
    }
}