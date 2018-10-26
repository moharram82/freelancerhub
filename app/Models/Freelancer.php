<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Freelancer extends Model
{
    protected $table = 'freelancers';

    public static function freelancerExists($freelancer_id) {
        return self::find($freelancer_id) ?? false;
    }
}