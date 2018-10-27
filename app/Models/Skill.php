<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = 'skills';

    public static function skillExists($skill_id) {
        return self::find($skill_id) ?? false;
    }
}