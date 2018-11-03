<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Freelancer extends Model
{
    protected $table = 'freelancers';

    public static function exists($freelancer_id) {
        return self::find($freelancer_id) ?? false;
    }

    public function contracts()
    {
        return $this->hasManyThrough('App\Models\Contract', 'App\Models\Proposal');
    }

    public function proposals()
    {
        return $this->hasMany('App\Models\Proposal');
    }

    public function packages()
    {
        return $this->hasMany('App\Models\Package');
    }

    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

    public function rfqs()
    {
        return $this->hasMany('App\Models\RFQ');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function experiences()
    {
        return $this->hasMany('App\Models\Experience');
    }

    public function skills()
    {
        return $this->belongsToMany('App\Models\Skill');
    }
}