<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $table = 'requests';

    public static function requestExists($request_id) {
        return self::find($request_id) ?? false;
    }
}