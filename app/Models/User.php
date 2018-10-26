<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'user_id';

    public static function userExists($user_id) {
        return self::find($user_id) ?? false;
    }
}