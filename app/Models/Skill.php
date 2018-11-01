<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = 'skills';

    public static function exists($skill_id) {
        return self::find($skill_id) ?? false;
    }

    public function freelancers()
    {
        return $this->belongsToMany('App\Models\Freelancer');
    }
}