<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'user_id';

    public static function exists($user_id) {
        return self::find($user_id) ?? false;
    }

    public function freelancer()
    {
        return $this->hasOne('App\Models\Freelancer', 'user_id');
    }

    public function customer()
    {
        return $this->hasOne('App\Models\Customer', 'user_id');
    }
}