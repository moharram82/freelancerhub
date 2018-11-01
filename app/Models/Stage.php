<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    protected $table = 'stages';

    public static function exists($stage_id) {
        return self::find($stage_id) ?? false;
    }
}