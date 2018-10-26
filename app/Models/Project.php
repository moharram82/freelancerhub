<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';

    public static function projectExists($project_id) {
        return self::find($project_id) ?? false;
    }
}