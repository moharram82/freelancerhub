<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';

    public static function exists($message_id) {
        return self::find($message_id) ?? false;
    }
}