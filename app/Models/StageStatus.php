<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StageStatus extends Model
{
    protected $table = 'stages_statuses';

    public static function statusExists($status_id) {
        return self::find($status_id) ?? false;
    }
}